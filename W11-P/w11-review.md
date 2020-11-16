# 11주차 리뷰


### 이클립스 vs. 인텔리제이

여러프로젝트를 한번에 열 수 있음(비주얼스튜디오와 마찬가지)

프로젝트마다 별도의 윈도우 창을 열어야함

Connection conn = null;

String driver = "oracle.jdbc.driver.OracleDriver";  -->오라클 드라이버 이름

String url = "jdbc:oracle:thin:@localhost:1521:xe";  --> 연결하는 위치, 이름

executeQuery(sql);  --> 실제로 쿼리를 동작시키게 하는 메소드


외부연결은 try catch를 사용 --> 문제발생시 어떤 건지 확인하기 위해서

ClassNotFoundException --> 드라이버 사용시 문제발견


### select() 부분

### Statement stmt = conn.createStatement();

sql String 객체로 만들고

statement라는 stmt객체에 넘겨줌 --> createStatement로 객체 만듬, 인자로 sql이 들어감 

### ResultSet rs = stmt.executeQuery(sql);

statement 객체가 sql문을 실행 =>  sql문을 보낼 수 있는 객체를 만들고 보냄 그 보낸 결과값은 Resultset이라는 rs객체에 저장함

### rs.close();		stmt.close();	conn.close();

rs.next()  --> rs객체는 next매소드로 인해서 하나하나 저장된 값을 읽어올 수 있음. 읽어올 수 없을때까지 읽음(while문 사용)
 
jdbc로 사용했던 rs, stmt, conn을 close로 닫아야함. --> 메모리 반환해서 더 사용 가능.

### Test so = new Test();	so.Select();	

Test라는 객체를 만들고 객체의 select라는 메소드를 동작시켜서 출력할 수 있게 함

### 리펙토링

위에서 묶어서 사용가능


### 트랜젝션

DB의 상태를 변환시키는 하나의 논리적 기능을 수행하기 위한 작업의 단위

한꺼번에 모두 수행되어야 할 일련의 연산들

실제 오라클 데이터 베이스에 저장되려면 commit; 해야함

commit 전에 예전 상태로 되돌리려면 rollback;

commit한다음에 rollback을 해야한다면 백업해야함.

### 오류발생1

처음에 커넥션시에 커넥션이 안되는 오류가 발생하였습니다.

이때, 라이브러리의 버전을 바꿨더니 커넥션이 되었습니다.

![오류발생](https://user-images.githubusercontent.com/70924137/99268674-d595b480-2868-11eb-8d48-8eca33d23ae0.JPG)

* 오류발생

![라이브러리 바꿈](https://user-images.githubusercontent.com/70924137/99268702-de868600-2868-11eb-83c8-451ee098f4dc.JPG)

* 라이브러리 변경

![커넥션 성공](https://user-images.githubusercontent.com/70924137/99268744-e514fd80-2868-11eb-8990-a76de1df06e1.JPG)

* 커넥션 성공



### 오류발생2

sqldeveloper에서 

insert into employees values (207, 'minjun', 'do', 'minjun.d', '123.456.789', TO_DATE(SYSDATE, 'dd-MM-yyyy'), 'IT_PROG', 15000, NULL, NULL, NULL);

이렇게 새로운 데이터를 넣었는데

select * from ( select * from employees order by rownum desc ) where rownum = 1;

이 행을 실행시에 206번이 마지막으로 나옵니다.

그래서 혹시나 해서 다시 207번을 넣었더니 이미 넣어져있어서 오류가 발생합니다.

이클립스에서 실행시에도 206번만 출력됩니다.


### 오류발생3

마지막에 리펙토링 하니

접속종료가 되어서 실행이 되질 않습니다.

DEPARTMENTS 테이블로 과제를 하였는데, 과제 실행시에도 접속종료가 되었습니다...

그래서 과제 동영상대신 과제 실행코드와(W11-P안에 위치) 오류 난 화면 캡쳐이미지 첨부합니다!

![오루류ㅠㅠ](https://user-images.githubusercontent.com/70924137/99268238-3a044400-2868-11eb-953b-aa128f58c34c.JPG)




