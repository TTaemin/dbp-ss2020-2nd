# 13주 학습회고

### 문제점1. 이클립스 설치 문제

이클립스를 재 다운 받았지만 자바 버전과의 연동이 안되었습니다. (자바 버전이 낮아 설치가 안됨)

그래서 예전에 다운받았던 이클립스를 사용했습니다.

### 문제점2. 오라클 설정 문제

오라클 설정하는 부분에서 오케이 버튼이 계속 뜨질 않았습니다.

-> ojdbc14를 아예 지워버리니 ok버튼이 떴습니다.

### JSP

JSP -> 자바언어와 html을 함께 사용 -> 동적인 웹페이지를 만듬

<% %> -> php의 <$ $> 표시와 비슷하게 사용됨


### index

	<ul>
  
		<li><a href="employees/List.jsp">직원 목록</a></li>
    
	</ul>

-> employees 폴더 안의 List.jsp에 sql관련 코드 넣음


### DBConnection

자바 커넥션 한번에 묶기

java resource의 src안에 패키지 만듬

도메인 주소를 거꾸로 씀 ex)) kr.ac.sungshin.w13

이 패키지 안에 DBConnection 클래스 만들어서 한번에 묶어놓음

	String driver = "oracle.jdbc.driver.OracleDriver";
  
	String url = "jdbc:oracle:thin:@localhost:1521:xe";
  
	String user = "hr";
  
	String password = "1234";
  
이 부분 지우고

try 안에 conn = DBConnection.getConnection();

### 과제

저는 Delete를 넣어서 데이터가 삭제될 수 있도록 하였습니다.

index.html에 "<li><a href="employees/delete.html">직원 삭제</a></li>" 를 넣어 인덱스에 직원삭제가 뜨게 하였고

거기에 delete.html과 Delete.jsp를 연동시켜 삭제가 작동되게 하였습니다.

Delete.jsp에는 String sql = "delete from employees where employee_id = ?" 라는 삭제 sql문을 사용하여 id를 치면 삭제되게 하였습니다.

### 과제 동영상 링크

https://youtu.be/JrMHnU_h3Ws

