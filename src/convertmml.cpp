#include <iostream>
#include <fstream>
#include <cstdlib>
#include <cstring>
#include "/usr/include/mysql/mysql.h"

using namespace std;

int defatultPinaoNumber(int);// ����Ʈ ��Ÿ��  �ǹݹ�ȣ �����ϴ� �Լ�
int octavePianoNumber(int , int ); // ��Ÿ�갡 �ٲ� �� �ǹ� ��ȣ �����ϴ� �Լ�
void highStoreRecord(char[]); //�ϳ��ϳ� ������ �迭�� �Է¹޾� ����������� �����ϴ� �Լ�. - �������ڸ�ǥ��
void lowStoreRecord(char[]); // �������ڸ�ǥ��


float musicRecord[1000][5];//DB�������� �����ϱ� ���� �迭



int main(int argc, char *argv[])
{
	ifstream inStream;

	inStream.open("CHOPSTICKS_mml.txt");
	if (inStream.fail())
	{
		cerr << "mml ������ �ҷ� ���� ���߽��ϴ�.\n";
		exit(1);
	}


	string track1 = ""; 
	inStream >> track1; //ù��° Ʈ��(������) mml �Է�

	string track2 = "";
	inStream >> track2; //�ι�° Ʈ��(�޼�) mml �Է�

	cout << track1 <<endl; //mml string�� Ʈ���� �°� ���� Ȯ��
	cout << track2 <<endl;


	char track1Arr[200]; //ù��° Ʈ���� ���ڸ� �ϳ��ϳ� ������ �迭
	char track2Arr[200]; //�ι��� Ʈ���� ���ڸ� �ϳ��ϳ� ������ �迭

	for(int m =0; m<200; m++)
	{
		track1Arr[m] = 'U'; // ���迭�� 'U'�� �ʱ�ȭ
		track2Arr[m] = 'U';
		
	}
	
	strcpy(track1Arr,track1.c_str()); // �Է¹��� Ʈ���� char�� �迭�� ���� �ϳ��ϳ��� ���� ����
	strcpy(track2Arr,track2.c_str());

	for(int h = 0; h<strlen(track1Arr); h++) //�°� ������ Ȯ��
	{
		cout << track1Arr[h]  <<" " <<endl;
	}
	for(int h = 0; h<strlen(track2Arr); h++)
	{
		cout << track2Arr[h]  <<" " <<endl;
	}



	for(int n = 0; n<1000; n++)
        {
                // ���迭�� -1�� �ʱ�ȭ.
                musicRecord[n][0] = -1;  //order
                musicRecord[n][1] = -1;  //right_note_time
                musicRecord[n][2] = -1;  //right_note_tune
                musicRecord[n][3] = -1;  //left_note_time
                musicRecord[n][4] = -1;  //left_note_tune
        }

	highStoreRecord(track1Arr); // Ʈ��1 ���� ���ڸ�ǥ �������� ����
	lowStoreRecord(track2Arr); // Ʈ��2 ���� ���ڸ�ǥ �������� ����

	//DB�� ���� �� �迭 Ȯ��
	
	/*
	for(int i = 0; i<strlen(track1Arr); i++)
	{
		cout << "  note_order : "      <<musicRecord[i][0]<< 
				"  right_note_time :  "<<musicRecord[i][1]<<
				"  right_note_tune1 : "<<musicRecord[i][2]<<
				"  right_note_tune2 : "<<musicRecord[i][3]<<
				"  right_note_tune3 : "<<musicRecord[i][4]<<
				"  right_note_tune4 : "<<musicRecord[i][5]<<
				"  left_note_time   : "<<musicRecord[i][6]<<
				"  left_note_tune1  : "<<musicRecord[i][7]<<
				"  left_note_tune2  : "<<musicRecord[i][8]<<
				"  left_note_tune3  : "<<musicRecord[i][9]<<
				"  left_note_tune4  : "<<musicRecord[i][10]<<endl;
	}
	*/

	for(int i = 0; i<strlen(track1Arr); i++)
        {
                cout << " note_order : "<<  musicRecord[i][0]  << "  note_right_time : "<< musicRecord[i][1] << "  note_right_tune : "<<musicRecord[i][2]<<
                        " note_left_time : "<<musicRecord[i][3]<<" note_left_tune : "<<musicRecord[i][4]<<endl;
        }

	inStream.close();

	//MySQL ����

        MYSQL *conn_ptr;
        MYSQL_RES *sql_result;
        MYSQL_ROW sql_row;


        conn_ptr = mysql_init(NULL);

        if(!conn_ptr)
        {
                fprintf(stderr, "mysql_init failed\n");
                return -1;
        }

        conn_ptr = mysql_real_connect(conn_ptr, "35.161.154.86", "root", "dong8036", argv[1], 0, NULL, 0
);

       //create table

	char createbuffer[256];
	sprintf(createbuffer, "CREATE TABLE IF NOT EXISTS %s(note_order float NOT NULL, note_time_right float NOT NULL, note_tune_right float NOT NULL, note_time_left float NOT NULL, note_tune_left float NOT NULL)",argv[2]);
	mysql_query(conn_ptr,createbuffer);

        //insert query

        int len = sizeof(musicRecord) / sizeof(musicRecord[0]);
        char insertbuffer[256];
        for(int i =0; i< len; i++)
        {
        if(musicRecord[i][0] != -1)
        {
                sprintf(insertbuffer,"INSERT INTO %s(note_order, note_time_right, note_tune_right, note_time_left, note_tune_left) VALUES(%f,%f,%f,%f,%f)",argv[2],musicRecord[i][0],musicRecord[i][1],musicRecord[i][2],musicRecord[i][3],musicRecord[i][4]);
        
		mysql_query(conn_ptr,insertbuffer);
        }
        }


        mysql_close(conn_ptr);

        return 0;
}





int defaultPianoNumber(int alphabet) // ����Ʈ��Ÿ��(4) �϶� C,D,E,F,G,H,A,B,C�� �ش��ϴ� �ǾƳ�ǹ�
{
	//���ĺ��� �ƽ�Ű�ڵ��
		int pianoNumber = 0;

		if(alphabet == 67) // C ��
		{
			pianoNumber = 13;
		}
		else if(alphabet == 68)// D ��
		{
			pianoNumber = 15;
		}
		else if(alphabet == 69)// E ��
		{
			pianoNumber = 17;
		}
		else if(alphabet == 70)// F ��
		{
			pianoNumber = 18;
		}
		else if(alphabet == 71)// G ��
		{
			pianoNumber = 20;
		}
		else if(alphabet == 65)// A ��
		{
			pianoNumber = 22;
		}
		else if(alphabet == 66 )// B ��
		{
			pianoNumber = 24;
		}

		return pianoNumber;
}
	

int octavePianoNumber(int currentOctave, int alphabet) // ���ĺ��� �а� ��Ÿ�� ���� �´� �ǹ� ��ȣ�� �����ϴ� �Լ�
{
	int pianoNumber2 = 0;
	
	if(currentOctave == 3) // ��Ÿ�갡 3 �ϋ�
	{
		pianoNumber2 = defaultPianoNumber(alphabet) - (12*1);
	}
	else if(currentOctave == 4 ) // ��Ÿ�� 4 �� ��
	{
		pianoNumber2 = defaultPianoNumber(alphabet); // ����Ʈ�� �״�� ����Ʈ �ǾƳ�ǹ��� ���󰡰� �ѿ�Ÿ���� �ǹݼ��ڴ� 12����.
	}
	else if(currentOctave == 5) // ��Ÿ�� 5 �� ��
	{
		pianoNumber2 = defaultPianoNumber(alphabet) + (12*1);
	}
	else if(currentOctave == 6) // ��Ÿ�� 6 �� ��
	{
		pianoNumber2 = defaultPianoNumber(alphabet) + (12*2);
	}
	else if(currentOctave == 7) // ��Ÿ�� 7 �� ��
	{
		pianoNumber2 = defaultPianoNumber(alphabet) + (12*3);
	}

	return pianoNumber2;
}

void highStoreRecord(char trackArr[])
{
	int order = 0; // ��ǥ ���� �ʱⰪ�� 0
	int indexMusicRecord = 0; // musicRecord�迭�� Ž���ϱ� ���� �ε���

	char currentTimeChar = '4'; // ����, ����Ʈ�� 4 
	int currentTimeInt = 4;

	char currentOctaveChar ='4'; // ��Ÿ�� , ����Ʈ�� 4
	int currentOctaveInt = 4; 

	//track1Arr�� ���ڸ� ���� musicRecord�� ����.
	for(int j = 0; j<strlen(trackArr); j++)
	{
		//cout<< "j �� : "<< j <<endl;
		if(trackArr[j] == 'T') // ���� ö�� 'T'�� ������ �״��� �迭�� �ε����� 3���� ���� �� ,������ �ʿ����� �����Ƿ� ���� �������� ����
		{
			cout << "find T : "<<  trackArr[j+1]<<trackArr[j+2]<<trackArr[j+3]  <<endl;
			
		}

		else if(trackArr[j] == 'L') // ���� ö�� 'L'�� ������ �״��� �迭�� �ε������� ���� ���� ����.
		{
			cout << "find L : "<< trackArr[j+1] <<endl;
			currentTimeChar = trackArr[j+1];
			
		}
		else if(trackArr[j] == 'O') // ��Ÿ�� ö�� 'O'�� ������ �״��� �迭�� �ε������� ��Ÿ�� ���� ����.
		{
			cout << "find O : "<<  trackArr[j+1]  <<endl;
			
			currentOctaveChar = trackArr[j+1];

			
			if(currentOctaveChar == '1') //char�� DB�� �����ϱ����� int�� ��ȯ
			{
				currentOctaveInt = 1;
			}
				
			else if(currentOctaveChar == '2')
			{
				currentOctaveInt = 2;
			}
				
			else if(currentOctaveChar == '3')
			{
				currentOctaveInt = 3;
			}
				
			else if(currentOctaveChar == '4')
			{
				currentOctaveInt = 4;
			}

			else if(currentOctaveChar == '5')
			{
				currentOctaveInt = 5;
			}

			else if(currentOctaveChar == '6')
			{
				currentOctaveInt = 6;
			}

			else if(currentOctaveChar == '7')
			{
				currentOctaveInt = 7;
			}

			else if(currentOctaveChar == '8')
			{
				currentOctaveInt = 8;
			}
			

		}
		else if(trackArr[j] == '<') // '<'�� ������ ��Ÿ�� -1
		{
			currentOctaveInt = currentOctaveInt -1;
		}

		else if(trackArr[j] == '>') // '>'�� ������ ��Ÿ�� +1
		{
			currentOctaveInt = currentOctaveInt +1;
		}
		else if(trackArr[j] == 'C' || trackArr[j] == 'D' || trackArr[j] == 'E' || trackArr[j] == 'F' || trackArr[j] == 'G' || trackArr[j] == 'A' || trackArr[j] == 'B')  // �׿� C,D,E,F,G,A,B ����
		{

			int pianoNum = octavePianoNumber(currentOctaveInt, int(trackArr[j])); //���� ��Ÿ�꿡�´� ���ĺ��� �ش��ϴ� �ǹ��� ���� pianoNum�� �����Ѵ�.

			if(currentTimeChar == '2') //char�� DB�� �����ϱ����� int�� ��ȯ
			{
				currentTimeInt = 2;
			}
				
			else if(currentTimeChar == '4')
			{
				currentTimeInt = 4;
			}
				
			else if(currentTimeChar == '8')
			{
				currentTimeInt = 8;
			}
				
//			else if(currentTimeChar == '16')
//			{
//				currentTimeInt = 16;
//			}
			
			cout << "find " << trackArr[j] <<endl;
			cout << "currentTime : " << currentTimeInt << endl;
			cout << "pianoNum : " << pianoNum << endl;


			musicRecord[indexMusicRecord][0] = order; // ��ǥ ���� ����
			order ++;
			musicRecord[indexMusicRecord][1] = currentTimeInt; // ���� ���� ����
			musicRecord[indexMusicRecord][2] = pianoNum; // �ǹ� ��ȣ ����
			
			indexMusicRecord ++;


			if(currentTimeInt == 2) //2����ǥ�� index 2���� ����.
			{
			indexMusicRecord ++;
			}
		}
	}
}


void lowStoreRecord(char trackArr[])
{
	int order = 0; // ��ǥ ���� �ʱⰪ�� 0
	int indexMusicRecord = 0; // musicRecord�迭�� Ž���ϱ� ���� �ε���

	char currentTimeChar = '4'; // ����, ����Ʈ�� 4 
	int currentTimeInt = 4;

	char currentOctaveChar = '4'; // ��Ÿ�� , ����Ʈ�� 4
	int currentOctaveInt = 4;

	//track1Arr�� ���ڸ� ���� musicRecord�� ����.
	for(int j = 0; j<strlen(trackArr); j++)
	{
		//cout<< "j �� : "<< j <<endl;
		if(trackArr[j] == 'T') // ���� ö�� 'T'�� ������ �״��� �迭�� �ε����� 3���� ���� �� ,������ �ʿ����� �����Ƿ� ���� �������� ����
		{
			cout << "find T : "<<  trackArr[j+1]<<trackArr[j+2]<<trackArr[j+3]  <<endl;
			
		}

		else if(trackArr[j] == 'L') // ���� ö�� 'L'�� ������ �״��� �迭�� �ε������� ���� ���� ����.
		{
			cout << "find L : "<< trackArr[j+1] <<endl;
			currentTimeChar = trackArr[j+1];
			
		}
		else if(trackArr[j] == 'O') // ��Ÿ�� ö�� 'O'�� ������ �״��� �迭�� �ε������� ��Ÿ�� ���� ����.
		{
			cout << "find O : "<<  trackArr[j+1]  <<endl;
			
			currentOctaveChar = trackArr[j+1];

			
			if(currentOctaveChar == '1') //char�� DB�� �����ϱ����� int�� ��ȯ
			{
				currentOctaveInt = 1;
			}
				
			else if(currentOctaveChar == '2')
			{
				currentOctaveInt = 2;
			}
				
			else if(currentOctaveChar == '3')
			{
				currentOctaveInt = 3;
			}
				
			else if(currentOctaveChar == '4')
			{
				currentOctaveInt = 4;
			}

			else if(currentOctaveChar == '5')
			{
				currentOctaveInt = 5;
			}

			else if(currentOctaveChar == '6')
			{
				currentOctaveInt = 6;
			}

			else if(currentOctaveChar == '7')
			{
				currentOctaveInt = 7;
			}

			else if(currentOctaveChar == '8')
			{
				currentOctaveInt = 8;
			}
			

		}
		else if(trackArr[j] == '<') // '<'�� ������ ��Ÿ�� -1
		{
			currentOctaveInt = currentOctaveInt -1;
		}

		else if(trackArr[j] == '>') // '>'�� ������ ��Ÿ�� +1
		{
			currentOctaveInt = currentOctaveInt +1;
		}
		else if(trackArr[j] == 'C' || trackArr[j] == 'D' || trackArr[j] == 'E' || trackArr[j] == 'F' || trackArr[j] == 'G' || trackArr[j] == 'A' || trackArr[j] == 'B')  // �׿� C,D,E,F,G,A,B ����
		{

			int pianoNum = octavePianoNumber(currentOctaveInt, int(trackArr[j])); //���� ��Ÿ�꿡�´� ���ĺ��� �ش��ϴ� �ǹ��� ���� pianoNum�� �����Ѵ�.

			if(currentTimeChar == '2') //char�� DB�� �����ϱ����� int�� ��ȯ
			{
				currentTimeInt = 2;
			}
				
			else if(currentTimeChar == '4')
			{
				currentTimeInt = 4;
			}
				
			else if(currentTimeChar == '8')
			{
				currentTimeInt = 8;
			}
				
//			else if(currentTimeChar == '16')
//			{
//				currentTimeInt = 16;
//			}
			
			cout << "find " << trackArr[j] <<endl;
			cout << "currentTime : " << currentTimeInt << endl;
			cout << "pianoNum : " << pianoNum << endl;


			//musicRecord[indexMusicRecord][0] = order; // ��ǥ ���� ����
			//if(currentTimeInt == 4)
			
			order ++;
			

			musicRecord[indexMusicRecord][3] = currentTimeInt; // ���� ���� ����
			musicRecord[indexMusicRecord][4] = pianoNum; // �ǹ� ��ȣ ����
			
			indexMusicRecord ++;

			if(currentTimeInt == 2) //2����ǥ�� index 2���� ����.
			{
			indexMusicRecord ++;
			}
		}
	}
}