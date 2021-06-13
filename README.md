# Bases de Datos: Informe Tarea 2 Grupo 21

| Integrante | Rol |
| :------: | :---: |
| Benjamin Cayo @Becayo | 201973057-6 |
| Felipe Fuentes @feliipx | 201973102-5 |
| Diego Pérez @Gackpod | 201973058-4 |

Les dejamos a continuación un usuario para que ingresen como administrador

- Mail: Jhonny.test2@usm.cl
- Pass: Jhonny

## Supuestos y consideraciones

- Consideramos modificar la columna *id* de la relación *usuario*, dado que al cargar la base de datos con los datos de la tarea 1 se tenían 25 usuarios, esto con el fin de que al agregar usuarios la id se incrementara a partir de ese punto.
- Agregamos una columna *admin* en la relación *usuario* para identificar a usuarios que fueran o no admins.
- Pensamos que la relación *cuenta_bancaria* no debía ser considera en el desarrollo de la plataforma, dado que esta solamente permite administrar las monedas virtuales que posee el usuario.
- Trabajamos con una base de datos alojada en un servidor de la plataforma de Microsoft Azure con la finalidad de tener la misma configuración en el archivo *db_config.php*, y para que todos los miembros tengamos acceso en tiempo real a la base de datos.
- Un admin no puede modificar los datos de otro admin por términos legales implicitos en el registro.

## Archivos agregados

- Se agregó *README.md* en el repositorio para formular el informe.
- Se agregó *pexels-2.jpg* en carpeta *img* para suplir la falta de imagen por miembro.
- Se agregó *bitcoin.gif* en carpeta *img* para mostrarlo en página principal.
- Se agregó en carpeta *img* 3 fotos de cada miembro del grupo para la sección *Quiénes Somos*.
- Se agregaron fotos de cada miembro en carpeta *img*

## Manejo del sistema de inicios de sesiones (ventaja y desventaja)

La implementación que realizamos para identificar Administradores se basó en, agregar el atributo *admin* de tipo booleano a la relación *usuario* de nuestra base de datos que determina si un usuario es admin o no. Esto genera mucha redundancia pero es funcional y nos ahorrariamos algunos JOINs al consultar si es que hubiesemos agregado una relación *administrador*, por que solo se hace una consulta a la tabla *usuario*. Esto lo usamos principalmente para distinguir en la barra de navegación los accesos de un usuario común y un administrador.

## Archivos de la plantilla que fueron modificados

- *Index.html* fue modificado con Bootstrap, se reestructuró el archivo completo con el fin de tener un diseño propio para la página principal.
- *style.css* fue modificado solamente para que el texto de cada item de la barra de navegación sea de color blanco y para que cuando uno pase el mouse por encima se marque.
- *header.html* fue modificado, se cambiaron algunas librerías de Bootstrap.
- *navbar.html* fue modificado para que las secciones sean mostradas según los permisos.

## Dificultades y tiempo

- En cuanto a html, css y php, como grupo podemos decir que gracias a Introducción a la Ingeniería ya teniamos experiencia trabajando con estos lenguajes.
- Tuvimos dificultades haciendo la consulta de la *wallet*.
- Tuvimos problemas realizando la encriptación de las contraseñas, por ende elegimos *MD5* como método de encriptación por su simplicidad, incluso conociendo su vulnerabilidad en proyectos más serios.
- Hubo dificultades en el diseño de la plataforma por falta de imaginación.
- Al implementar el *DELETE* se tuvo que modificar la tabla, se cambio una *constraint* y se cambio por **ON DELETE CASCADE**, de esta manera solamente se tuvo que hacer una query para que todo lo relacionado con una respectiva id se eliminara en consecuencia. Esto dificultó un poco el desarrollo dado que de primeras no se podía modificar y tomó tiempo solucionarlo.

| Estimadores | Tiempo Felipe [min] | Tiempo Diego [min] | Tiempo Benja [min] |
| :---------: | :-----------------: | :----------------: | :----------------: |
| Análisis enunciado                 | 60   | 60   | 60   | 
| Modificaciones y ajustes al modelo | 1040 | 950  | 520  |
| Diseño de plataforma               | 40   | 30   | 500  |
| Pruebas finales                    | 240  | 240  | 240  |
| Tiempo total                       | 1380 | 1280 | 1320 |

Estos tiempos son un estimado dado que comenzamos a trabajar en la tarea hace aproximadamente un mes.