set -e

echo "Creacion de imagen cerfificados"


#Borrado de carpeta base

docker build . -t docker.pkg.github.com/donleandro/Certificados-de-Excelencia-Uniandes/melab:1.0.0 -t docker.pkg.github.com/donleandro/Certificados-de-Excelencia-Uniandes/melab:latest



exec "$@"
