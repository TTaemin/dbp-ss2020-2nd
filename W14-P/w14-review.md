# 14주차 학습회고


### sql vs. mongoDB

* sql -> 관계형 데이터베이스에서 가장 중요한 것 = 테이블

* 몽고디비 -> 도큐먼트기반 데이터 - 테이블형태가 아니라 key, value의 형태로 만들어짐

  Json과 비슷함 javascript object Notation - 웹서버와 통신할때 데이터 주고받을 때 사용함.

### mongoDB 다운

mongod.exe --> 서버

mongo.exe --> 서버에 접속하는 클라이언트

* 환경변수 설정하고 터미널에서 mongo치면 접속됨.

  -> 127.0.0.1 = 로컬호스트

  -> 27017 = 포트번호


### mongoDB

도큐먼트들은 컬렉션 안에 있음 (어떤 도큐먼트들인지 구분) -> 컬렉션이 모여있는 것 = 데이터베이스

도큐먼트는 key:value 형식으로 되어있음

value에 [ ] 대괄호 사용하면 여러개의 값 넣을 수 있음 -> 배열 형태로 사용가능.

### mongoDB안에 도큐먼트 생성하기

* insertOne -> 데이터 한개 넣기

  > db.myCollection.insertOne({x: 1})
  
  db 안의 myCollection(Collection이름) 안에 {x: 1} 이라는 도큐먼트를 한개 넣겠다는 의미

* insertMany -> 도큐먼트 여러개 넣기

  > db.myCollection.insertMany([{x:2, Y:3}, {x:4, x:5}, {x:6, y:[7,8,9]}])

* 도큐먼트 찾기

  > db.myCollection.find()

* 특정 도큐먼트 찾기

  > db.myCollection.find({x:1})
  
    --> x가 1인 도큐먼트 찾기

* 특정 도큐먼트 찾기2

  > db.myCollection.find({"y.0":7})
  
    --> 첫번째 인덱스에 7이들어간 도큐먼트 찾기

* id값 가리기

  > db.myCollection.find({x:6},{_id:false})

* 찾고자하는 데이터의 첫번째 위치값 - (c언어의 포인터같은 역할)

  > var cursor = db.myCollection.find()

* 지금 가리키는 위치 다음위치로 이동

  > cursor.next()

* 이 다음에 도큐먼트가 있는지 확인

  > cursor.hasNext()

    --> true면 있음

* 직접 데이터를 가져와서 배열형태로 출력

  > db.myCollection.find().toArray()


### 도큐먼트 수정

* 하나의 도큐먼트 바꾸기

  > db.myCollection.replaceOne({x:2}, {x:10, y:11})
  
    --> x가 2인 것을 x:10, y:11으로 바꿈
	
-->데이터 수정하는데 없는 도큐먼트를 수정하면 새로 추가됨

* 여러개 있는 것 중에 하나 수정

  > db.myCollection.updateMany({x:6},{$set:{"y.$[e]":17}},{arrayFilters:[{e:7}]})
  
   { "acknowledged" : true, "matchedCount" : 1, "modifiedCount" : 1 }
    
	   --> { }안에는 매치 되는게 하나고 하나를 수정했음을 의미함


### 데이터 삭제

* 삭제

  > db.myCollection.deleteOne({x:1})

  { "acknowledged" : true, "deletedCount" : 1 }

* 전부 삭제
  > db.myCollection.deleteMany({})
  
  { "acknowledged" : true, "deletedCount" : 4 }
  
    -->{ } 안에는 4개를 찾았고 4개를 지움을 의미함


* 컬렉션 삭제

  > db.article.drop()

* 데이터베이스 삭제

  >db.dropDatabase()
  
* mongoDB 종료

    >exit

### 기타

똑같은 걸 중복해서 설치하는 것 --> 복제

하나의 데이터베이스를 나눠서 설치하는 것 --> 샤딩 --> 안정성을 위해


### 과제

저는 저희 팀의 주제인 지하철의 정보를 가지고 과제를 했습니다. 

subway 안에 locker를 넣고 그 안에 지하철호선, 역, 라커위치를 넣었습니다.


수정은 모든 데이터에 라커의 수량을 넣어보았고, 3호선의 약수역을 6호선으로 바꿔보았습니다. 

그리고 마지막으로 모든 도큐먼트와 컬렉션, 데이터베이스까지 지워보았습니다.


### 과제 동영상

https://youtu.be/vbQeIiLJhwQ


