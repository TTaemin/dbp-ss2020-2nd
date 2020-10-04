# ▶ 2주차 과제 리뷰 ◀

### ★ update



### ★ update

※ update버튼 만들기
author.php 파일에
$author_info .= '<td><a href="author.php?id='.$filtered['id'].'">update</a></th>';
와 html부분에 <th>update</th>를 삽입.

※ update_author를 작동 시키려면 
process_update_author 파일을 따로 만들어서
$filtered = array(
        'id' => mysqli_real_escape_string($link, $_POST['id']),
        'name' => mysqli_real_escape_string($link, $_POST['name']),
        'profile' => mysqli_real_escape_string($link, $_POST['profile'])
    );
를 넣고 쿼리문도 author로 수정한다.


### ★ delete

※delete 버튼 만들기
author.php파일에
$author_info .= '
        <td>
          <form action="process_delete_author.php" method="post">
            <input type="hidden" name="id" value="'.$filtered['id'].'">
            <input type="submit" value="delete">
          </form>
        </td>
      ';
와 html부분에 <th>delete</th>를 삽입

※ 여기서 value로 들어가는 값은 delete했을 때 받아오는 값

※ delete 버튼을 활성화 시키려면
process_delete_author.php 파일을 따로 만들어야 함.


### ★ 과제 review
과제로 Food 안에 chef라는 인덱스를 만들어 그 안에 번호, 셰프의 이름과 출신 나라를 넣게 만들었습니다.
교수님이 알려주신 대로 name과 country에 텍스트를 입력하고 Create chef 버튼을 누르면 테이블 안에 데이터가 들어갈 수 있게 하였습니다.
또한 테이블안의 update버튼으로 수정이 가능하며 delete버튼을 누르면 삭제가 가능하게 구현하였습니다.
직접 만든 코드로 테이블이 생성되고 그 안에 생성된 버튼들이 구현되는 것을 보니 매우 흥미롭고 뿌듯하였습니다.


### ★ 구현 동영상 링크 
https://youtu.be/IWfFU1v5sxg



