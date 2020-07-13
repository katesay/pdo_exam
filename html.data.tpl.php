
<!-- 행 시작 -->
<tr>
	<!-- 번호 -->
	<td height=20 bgcolor=white align=center>
		<a href="read.php?id=<?=$row["id"]?>&no=<?=$no?>">
		<?=$row["id"]?></a>
	</td>
	<!-- 번호 끝 -->
	<!-- 제목 -->
	<td height=20 bgcolor=white>&nbsp;
		<a href="read.php?id=<?=$row["id"]?>&no=<?=$no?>">
		<?=strip_tags($row["title"], '<b><i>');?></a>
	</td>
	<!-- 제목 끝 -->
	<!-- 이름 -->
	<td align=center height=20 bgcolor=white>
		<font color=black>
		<a href="mailto:<?=$row["email"]?>"><?=$row["name"]?></a>
		</font>
	</td>
	<!-- 이름 끝 -->
	<!-- 날짜 -->
	<td align=center height=20 bgcolor=white>
		<font color=black><?=$row["wdate"]?></font>
	</td>
	<!-- 날짜 끝 -->
	<!-- 조회수 -->
	<td align=center height=20 bgcolor=white>
		<font color=black><?=$row["view"]?></font>
	</td>
	<!-- 조회수 끝 -->
</tr>
<!-- 행 끝 -->