<?php
include('header.php');
?>
<div id='head3'>
	<div id='appname'>Passatempos</div>
	<div id='insert'><form method='post' action='index.php?route=passatempos/edit/'><input type='submit' value='Adicionar passatempos +'/></form></div>
</div>

<div id ='main'>
	<div id='left'>
		<div id='search' >
			<form action="?route=passatempos/&search=1" method="post">
				<img src='images/search.png' alt='search' style='margin-top:6px;'/>
				<input type='text' name='search_word' style='width:200px;border:1px solid grey;'/>
				<input type="submit" value="Go" />
			</form>
		</div>
		<table>
			<tr class='titulos'>
				<td>Acções</td>
				<td>ID</td>
				<td>Título</td>
				<td>Link</td>
				<td >Estado</td>
				<td >Data de início</td>
				<td >Data de final</td>
				<td >Dias</td>
				<td >Participações</td>
				<td >Imagem</td>
			</tr>
			<?php foreach($passatempos as $passa): ?>
			<tr>
				<td style='padding-left:10px;'>
					<a href=''><img src='images/people.png' alt='people' width='20px' height='20px' class='people'/></a>
					<?php if($passa->activo==0): ?>
					<img src='images/red_dot.gif' alt='red_dot' class='dot'/>
					<?php else: ?>
					<img src='images/green_dot.gif' alt='green_dot' class='dot'/>
					<?php endif; ?>
				</td>
				<td><?php echo $passa->id; ?></td>
				<td><a href='<?php echo "?route=passatempos/".$passa->id; ?>'><?php echo $passa->titulo; ?></a></td>
				<td><a href='<?php echo "index.php?route=passatempos/".$passa->id."/view"; ?>'>Ver</a></td>
				<td><?php echo $passa->estado; ?></td>
				<td><?php echo $passa->data_inicial; ?></td>
				<td><?php echo $passa->data_final; ?></td>
				<td><?php echo calcula_dias($passa->data_inicial,$passa->data_final); ?> dias</td>
				<td><a href='?route=participacoes/<?php echo $passa->id; ?>'><?php echo $passa->participacoes; ?></a></td>
				<td><img src='<?php echo $passa->imagem; ?>' alt='image' width='150px' height='150px'/></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div id='right'>
		<div id='filtrar_titulo'>Filtrar</div>
		<div id='filtrar_body'>
			<ul class="estado">
				<li><b>Estado</b></li>
				<li><a href='?route=passatempos/'>Todos</a></li>
				<li><a href='?route=passatempos/&filter=estado&value=inactivo'>Inactivo</a></li>
				<li><a href='?route=passatempos/&filter=estado&value=emcurso'>Em curso</li>
				<li><a href='?route=passatempos/&filter=estado&value=poriniciar'>Por iniciar</li>
				<li><a href='?route=passatempos/&filter=estado&value=terminado'>Terminado</li>
			</ul>
			<ul class="tipo">
				<li><b>Tipo</b></li>
				<li><a href='?route=passatempos/'>Todos</a></li>
				<li><a href='?route=passatempos/&filter=tipo&value=multiplas'>Múltiplas</a></li>
				<li><a href='?route=passatempos/&filter=tipo&value=texto'>Texto</a></li>
				<li><a href='?route=passatempos/&filter=tipo&value=imagem'>Imagem</a></li>
				<li><a href='?route=passatempos/&filter=tipo&value=link_video'>Link vídeo</a></li>
				<li><a href='?route=passatempos/&filter=tipo&value=imagem_video'>Imagem ou link vídeo</a></li>
			</ul>
		</div>
	</div>
</div>
</body>

</html>


