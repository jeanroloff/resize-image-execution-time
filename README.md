# Resize Image Execution Time PHP - Redimensionar o tempo de execução da imagem em PHP 
Resize Image in Execution Time PHP

Redimencionar imagens e diminuir qualidade em tempo de execução:

Lógica:
O idel é para quando é necessário redimencionar as imagens quando elas já foram upadas sem uma biblioteca de redimencionamento.

Para utilizar basta ter o arquivo resize.php em algum diretório e invocá-lo por meio GET, passando a URL RELATIVA do arquivo:

Ex:

site.com.br/resize.php?foto=arquivos/fotos/foto.jpg&largura=100&altura=100&qualidade=80

Isto retornaria a imagem cortada em 100 x 100 e com qualidade de 80.

O arquivo deve ser alterado para melhorias como "crop" e "zoom crop".
