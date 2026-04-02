<?php

// Cargar la imagen jpg
							$imagen = imagecreatefromjpeg('C:\Users\AServer\Desktop\Nueva carpeta/3.jpg');

                            // Establece la paleta de colores
                            imagepalettetotruecolor($imagen);

							// Guardar la imagen como WebP
							imagewebp($imagen, 'C:\Users\AServer\Desktop\Nueva carpeta/3.webp', 80);

							// Liberar memoria
							imagedestroy($imagen);



?>