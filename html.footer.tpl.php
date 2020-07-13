
</table>
<!-- 게시물 리스트를 보이기 위한 테이블 끝-->
<!-- 페이지를 표시하기 위한 테이블 -->
<table border=0>
<tr>
	<td width=600 height=20 align=center rowspan=4>
	<font color=gray>
	&nbsp;
<?
$start_page = floor(($current_page - 1) / $page_list_size) 
				* $page_list_size + 1;

# 페이지 리스트의 마지막 페이지가 몇 번째 페이지인지 구하는 부분이다.
$end_page = $start_page + $page_list_size - 1;

if ($total_page < $end_page) $end_page = $total_page;
if ($start_page >= $page_list_size) {
	# 이전 페이지 리스트값은 첫 번째 페이지에서 한 페이지 감소하면 된다.
	# $page_size 를 곱해주는 이유는 글번호로 표시하기 위해서이다.

	$prev_list = ($start_page - 2)*$page_size;
	echo "<a href=\"?no=$prev_list\">◀</a>\n";
}

# 페이지 리스트를 출력
for ($i=$start_page;$i <= $end_page;$i++) {
	$page= ($i-1) * $page_size;// 페이지값을 no 값으로 변환.
	if ($no!=$page){ //현재 페이지가 아닐 경우만 링크를 표시
		echo "<a href=\"?no=$page\">";
	}
	
	echo " $i "; //페이지를 표시
	
	if ($no!=$page){
		echo "</a>";
	}
}

# 다음 페이지 리스트가 필요할때는 총 페이지가 마지막 리스트보다 클 때이다.
# 리스트를 다 뿌리고도 더 뿌려줄 페이지가 남았을때 다음 버튼이 필요할 것이다.
if($total_page > $end_page)
{
	$next_list = $end_page * $page_size;
	echo "<a href='?no=$next_list'>▶</a><p>";
}
?>
	</font>
	</td>
</tr>
</table>
<a href=write.php>글쓰기</a>
</center>
</body>
</html>