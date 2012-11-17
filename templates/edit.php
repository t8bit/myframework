<?php
$passa=$passatempos[0];
echo "<pre>";
print_r($_POST);
echo "</pre>";
include('header.php');
?>
<script>
$(document).ready(function() {
	$('#add_imagem').click(function() {
		$('#images_loading').load('index.php?route=galeria/add');
		return false;	
	});
	$(".imagem").live("click", function(){
		src=$(this).attr('src');
		$('#imagem_add').val(src);
	});
});
</script>
<div id='head3'>
	<div id='appname'>Adicionar Passatempo</div>
	<div id='insert'></div>
</div>

<div id ='main'>
<form action="" method="post">
	<table border='0'>
		<tr>
			<td class='name_'></td>
			<td class='left'><input type="checkbox" name="activo" value="1" <?php if($passa->activo==1){echo 'checked';} ?> />Activo</br></td>
		</tr>
		<tr>
			<td class='name_'>Titulo:</td>
			<td class='left'><input class='w700' type='text' name='titulo' value='<?php echo $passa->titulo; ?>'/></br></td>
		</tr>
		<tr>
			<td class='name_'>Resumo para HP: </td>
			<td class='left'><textarea name='resumo'><?php echo $passa->resumo; ?></textarea></br></td>
		</tr>
		<tr>
			<td class='name_'>Data inicial:</td>
			<td class='left'><input type='text' class='datepicker' name='data_inicial' value='<?php echo $passa->data_inicial; ?>'/></br></td>
		</tr>
		<tr>
			<td class='name_'>Data final:</td>
			<td class='left'><input type='text' class='datepicker' name='data_final' value='<?php echo $passa->data_final; ?>'/></br></td>
		</tr>	
	</table>
	
	
	<table border='0'>
		<tr>
			<td class='name_'>Parametrização:</td>
			<td class='left'>
				<table border='0'>
					<tr>
						<td><input type='checkbox' name='param' value='1'/><span class='f8'>Apenas para fãs</span></td>
						<td><input type='checkbox' name='param' value='2'/><span class='f8'>As participações recebidas são publicadas automaticamente na galeria sem aprovação prévia</span></td>
					</tr>
					<tr>
						<td><input type='checkbox' name='param' value='3'/><span class='f8'>Votação</span></td>
						<td><input type='checkbox' name='param' value='4'/><span class='f8'>Pedir informações de contacto</span></td>
					</tr> 
				</table>
			</td>
		</tr>
		<tr>
			<td class='name_'>Mecânica de votação:</td>
			<td class='left'>
				<select name='mec_votacao'>
					<option value='select'>Selecione...</option>
					<option value='1voto1'>Um voto por cada participação</option>
					<option value='1voto1dia'>Um voto por cada dia por cada utilizador</option>
					<option value='nr_fixo'>Número fixo de votos disponiveis</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class='name_'>Descrição:</td>
			<td class='left'><textarea name='descricao'><?php echo $passa->descricao; ?></textarea></td>
		</tr>
		<tr>
			<td class='name_'>Tipo:</td>
			<td class='left'>
				<select name='tipo'>
					<option value='texto'>Texto</option>
					<option value='multiplas'>Multiplas</option>
					<option value='imagem'>Imagem</option>
					<option value='link_video'>Link video</option>
					<option value='imagem_video'>Imagem ou link video</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class='name_'>Desafio:</td>
			<td class='left'><textarea name='desafio'><?php echo $passa->desafio; ?></textarea></td>
		</tr>
		<tr>
			<td class='name_'>Mínimo de recomendações</td>
			<td class='left'><input class='w700' type='text' name='minimo' value='<?php echo $passa->minimo; ?>'/></td>
		</tr>
		<tr>
			<td class='name_'>Max de participações</td>
			<td class='left'><input class='w700' type='text' name='max_participacoes' value='<?php echo $passa->max_participacoes; ?>'</td>
		</tr>
		<tr>
			<td class='name_'>Regulamento</td>
			<td class='left'><textarea name='regulamento'><?php echo $passa->regulamento; ?></textarea></td>
		</tr>
		<tr>
			<td class='name_'>Agradecimento</td>
			<td class='left'><textarea name='agradecimento'><?php echo $passa->agradecimentos; ?></textarea></td>
		</tr>
		<tr>
			<td class='name_'>Vencedores</td>
			<td class='left'><textarea name='vencedores'><?php echo $passa->vencedores; ?></textarea></td>
		</tr>
		<tr>
			<td class='name_'>Inicio da publicação de vencedores</td>
			<td class='left'><input type='text' name='inicio' class='datepicker' value='<?php echo $passa->inicio; ?>'/></td>
		</tr>
	</table>
	<table border='0'>
		<tr>
			<td class='name_'><input type='checkbox' value='' name='imagem'> Mostrar imagem na página de detalhe do passatempo</td>
			<td class='left'></td>
		</tr>
		<tr>
			<td class='name_'>Imagem:</td>
			<td class='left'>
				<input type='text' name='imagem' id='imagem_add'/>
				<input type="submit" id='add_imagem' name="submit" value="Adicionar imagem" />
			</td>
		</tr>
	</table>
	<input type="submit" value="Inserir" />
</form>
<div id='images_loading' style='width:500px;height:500px;'></div>
