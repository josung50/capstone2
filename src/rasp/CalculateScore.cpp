#include <iostream>
#include <fstream>
#include <sstream>
#include <bitset>
#include <boost/algorithm/string.hpp>
#include <cstdlib>
#include <string>
#include <deque>

#include "/usr/include/mysql/mysql.h"

using namespace std;

void connectDB(char,char,char); // MYSQL 연동 함수

const char MAESTRO_IP = "35.161.154.86";
const char DB_SERVER_ID = "root";
const char DB_SERVER_PW = "dong8036";

// original, played note
deque <string> originalNote;
deque <string> playedNote;

// binary to decimal
deque <int> noteSplited;
deque <int> playSplited;

// remove repeat number
deque <int> removedNote;
deque <int> removedPlay;

// original, played data
deque <string> original;
deque <string> played;

int originalNoteOn, playedNoteOn, scoreCount = 0;
string noteOn = "1001";
string Judge = "1000";

bool onCheck[78] = {false};

void SplitNote();
int TwoToTen(string stringTwo);
void InitonCheck();
void FindNoteOn(deque<string> &NoteOn, deque<string> &NoteList, int NumNoteOn);
void RemovedRepeat(deque<int> &Splited, deque<int> &Removed);

const unsigned g_unMaxBits = 32;

string Hex2Bin(const string& s)
{
	stringstream ss;
	ss << hex << s;
	unsigned n;
	ss >> n;
	bitset<g_unMaxBits> b(n);

	unsigned x = 0;
	if (boost::starts_with(s, "0x") || boost::starts_with(s, "0X")) x = 2;
	return b.to_string().substr(32 - 4*(s.length() - x));
}


int main(int argc, char *argv[]){

	ifstream inStream;
	ifstream onStream;

	string inStr;
	string onStr;

	inStream.open(argv[1]);
	onStream.open(argv[2]);
	
	int scoreResult = 0;
	
	if(inStream.fail()){
		cerr << "Input file in  open failed.\n";
		exit(1);
	}

	if(onStream.fail()){
		cerr << "Input file on open failed.\n";
		exit(1);
	}

	while(!inStream.eof()){
	inStream >> inStr;
	original.push_back(Hex2Bin(inStr));
	}

	while(!onStream.eof()){
	onStream >> onStr;
	played.push_back(Hex2Bin(onStr));
	}

	FindNoteOn(original, originalNote, originalNoteOn);
	FindNoteOn(played, playedNote, playedNoteOn);

	SplitNote();

	for (int i = 0; i < removedNote.size(); i++){
		for(int j = 0; j < 4; j++){
			if(removedNote[i] == removedPlay[0]){
				scoreCount++;
				removedPlay.pop_front();
				break;
			}
			else
				removedPlay.pop_front();
		}
	}
	scoreResult = int(scoreCount/removedNote.size()*100);
	cout << "score is " << scoreResult << endl;

	inStream.close();
	onStream.close();

	connectDB(char MAESTRO_IP, char DB_SERVER_ID, char DB_SERVER_PW);


}

void FindNoteOn(deque<string> &NoteOn, deque<string> &NoteList, int NumNoteOn){
	for (int i = 0; i < NoteOn.size(); i++){
		if(noteOn.compare(NoteOn[i].substr(0,4)) == 0){
			NumNoteOn = i;
			break;
		}
	}
	
	for (int i = NumNoteOn; i < NoteOn.size()-6; i+=3){
		if((Judge.compare(NoteOn[i].substr(0,4)) == 0) || ((noteOn.compare(NoteOn[i].substr(0,4)) == 0) && (i != NumNoteOn))){
			NoteList.push_back(NoteOn[i+2]);
			i++;
		}
		else
			NoteList.push_back(NoteOn[i+1]);
	}
}

void RemovedRepeat(deque<int> &Splited, deque<int> &Removed){
	// binary origin Note to decimal
	for (int i = 0; i < originalNote.size(); i++)
		Splited.push_back(TwoToTen(originalNote[i]));
	
	// remove repeated note
	for (int i = 0; i < Splited.size(); i++){
		if(!onCheck[Splited[i]]){
			onCheck[Splited[i]] = true;
			Removed.push_back(Splited[i]);
		}
		else
			onCheck[Splited[i]] = false;
	}
}
	
void SplitNote()
{
	RemovedRepeat(noteSplited, removedNote);	

	// init onCheck
	for (int i = 0; i < 78; i++)
		onCheck[i] = false;
	
	RemovedRepeat(playSplited, removedPlay);
}

int TwoToTen(string stringTwo)
{
	int result = 0;
	int e = 1;

	for(int i = stringTwo.length() - 1; i >= 0; i--){
		for(int j = 0; j < stringTwo.length() - i - 1; j++)
			e *= 2;
		if(stringTwo[i] == '1')
			result += e;
		e = 1;
	}

	return result;
}



void connectDB(char MAESTRO_IP, char DB_SERVER_ID, char DB_SERVER_PW){

	//MySQL 연동

        MYSQL *conn_ptr;
        MYSQL_RES *sql_result;
        MYSQL_ROW sql_row;


        conn_ptr = mysql_init(NULL);

        if(!conn_ptr){

                fprintf(stderr, "mysql_init failed\n");
                return -1;
        }

        conn_ptr = mysql_real_connect(conn_ptr, MAESTRO_IP, DB_SERVER_ID, DB_SERVER_PW, score, 0, NULL, 0);


        //insert query

        
        char insertbuffer[256];


                sprintf(insertbuffer,"INSERT INTO SCORE(user,song,score) VALUES(%s,%s,%f)",argv[3],argv[4],scoreResult);    // argv[3]:user ID argv[4]:song name
        
		mysql_query(conn_ptr,insertbuffer);


        mysql_close(conn_ptr);

}
