# Bases de Datos: Informe Tarea 2 Grupo 21

| Integrante | Rol |
| :------: | :---: |
| Benjamin Cayo | 201973057-6 |
| Felipe Fuentes | 201973102-5 |
| Diego Pérez | 201973058-4 |


## Supuestos y consideraciones

- Consideramos que la relación "cuenta_bancaria" no debía ser considera en el desarrollo de la plataforma, dado que esta solamente permite administrar las monedas virtuales que posee el usuario.
- 
-
-

## Archivos agregados

- 
- Se agregó *README.md* en el repositorio para formular el informe.
- Se agregó *pexels-2.jpg* en carpeta *img* para suplir la falta de imagen por miembro.
- Se agregó *bitcoin.gif* en carpeta *img* para mostrarlo en página principal.
- Se agregó en carpeta *img* 3 fotos de cada miembro del grupo para la sección *Quiénes Somos*.

## Manejo del sistema de inicios de sesiones

La implementación que realizamos para identificar Administradores se basó en, agregar el atributo *admin* de tipo booleano a la relación *usuario* de nuestra base de datos que determina si un usuario es admin o no. Esto genera mucha redundancia pero es funcional y nos ahorrariamos algunos JOINs al consultar si es que hubiesemos agregado una relación *administrador*, por que solo se hace una consulta a la tabla *usuario*. Esto lo usamos principalmente para distinguir en la barra de navegación los accesos de un usuario común y un administrador.

## Archivos de la plantilla que fueron modificados

- *Index.html* fue modificado con Bootstrap, se reestructuró el archivo completo con el fin de tener un diseño propio para la página principal.
- *style.css* fue modificado solamente para que el texto de cada item de la barra de navegación sea de color blanco y para que cuando uno pase el mouse por encima se marque.
- *header.html* fue modificado, se cambiaron algunas librerías de Bootstrap.
- 

## Dificultades y tiempo

| Estimadores | Tiempo Felipe [min] | Tiempo Diego [min] | Tiempo Benja [min] |
| :---------: | :-----------------: | :----------------: | :----------------: |
| Análisis enunciado                 | x | x | 30  | 
| Modificaciones y ajustes al modelo | x | x | 60  |
| Diseño de plataforma               | x | x | 240 |
| Pruebas finales                    | x | x | x |
| Tiempo total                       | x | x | x |