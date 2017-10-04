<?php
error_reporting(0);
/* arquivo alterado*/
$foto_recebida = $_GET['foto'];
$foto_recebida = str_replace("http", "..", $foto_recebida);
$foto_recebida = str_replace("https", "..", $foto_recebida);
$foto_recebida = str_replace("//", "..", $foto_recebida);
$foto_recebida = str_replace('//', "..", $foto_recebida);

// codigo acima impede recebimento de fotos de outros sites


// intval faz com que seja impossível passar valores siferentes de inteiros.
$largura_nova = intval( $_GET['largura'] );
$altura_parametro = intval( $_GET['altura'] );

// Somente exita números muito pequenos. Para este exemplo não quero
if($largura_nova < 20)
	$largura_nova = 20;

// Carregar imagem já existente no servidor
$imagem = imagecreatefromstring( file_get_contents($foto_recebida) );
/* @Parametros
 * "foto.jpg" - Caminho relativo ou absoluto da imagem a ser carregada.
 */

// Obtem a largura_nova da imagem
$largura_original = imagesx( $imagem );
/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 */

// Obtém a altura da imagem
$altura_original = imagesy( $imagem );
/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 */

// Calcula a nova altura da imagem 
if($altura_parametro != ""){
	$altura_nova = $altura_parametro;
} else {
	$altura_nova = intval( ( $altura_original * $largura_nova ) / $largura_original );	
}


// Cria a nova imagem com os tamanhos novos
$nova_imagem = imagecreatetruecolor( $largura_nova, $altura_nova );
/* @Parametros
 * $largura_nova - Largura da nova imagem
 * $altura_nova - Altura da nova imagem
 */

// Cria uma cópia da imagem com os novos tamanhos e 
// passa para a imagem criada com imagecreatetruecolor
imagecopyresampled( $nova_imagem, $imagem, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original, $altura_original );
/* @Parametros
 * $nova_imagem - Nova imagem criada com imagecreatetruecolor
 * $imagem - Imagem a ser redimensionada.
 * 0 - Valor X de destino. Usado quando recortar
 * 0 - Valor Y de destino. Usado quando recortar
 * 0 - Valor X da imagem original. Usado quando recortar
 * 0 - Valor Y da imagem original. Usado quando recortar
 * $largura_nova - Nova largura
 * $altura_nova - Nova altura
 * $largura_original - Altura da imagem original
 * $altura_original - Largura da imagem original
 */

// Header informando que é uma imagem png
header( 'Content-type: image/png' );

// eEnvia a imagem para o borwser ou arquivo
imagejpeg( $nova_imagem,NULL, $_GET['qualidade'] );


/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 * NULL - O caminho para salvar o arquivo. 
          Se não definido ou NULL, o stream da imagem será mostrado diretamente. 
 * 80 - Qualidade da compresão da imagem.
 */
