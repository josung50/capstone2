# Maestro

Maestro는 전자피아노기기에 라즈베리파이(이하 rasp)를 부착하여 사용자로 하여금

악보를 읽을 줄 모르는 사용자도 연주가 가능하도록 도와주는 학습 프로젝트입니다.

사용자가 웹 페이지에서 로그인하여 자신의 계정을 통해 연주하고 점수 조회를 할 수 있으며, 

악보를 선택하였을 때, 서버에서는 사용자가 사용자가 고른 곡 의 연주를 위해 rasp에게 LED불을 

켜는 코드를 실행하도록 명령을 합니다. 명령을 받은 rasp는 서버에 저장되어 있는 DB 를 읽어와서 

해당하는 건반에 불이 들어오도록 한다. 사용자가 사용자가 불빛이 들어온 건반을 정확하게 

눌렀는지 스위치로 측정하여 점수로 나타내도록 합니다. 측정된 점수를 통해 랭킹을 조회 할 수 있습니다.
