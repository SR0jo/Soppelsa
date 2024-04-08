// Importar los módulos necesarios
const mysql = require('mysql');
const fs = require('fs');

// Crear la conexión a la base de datos
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'soppelsa'
});

// Conectar a la base de datos
db.connect((err) => {
  if (err) {
    throw err;
  }

  // Consulta SQL
  let query = 'SELECT * FROM productos';

  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }

    // Convertir los resultados a JSON
    const json = JSON.stringify(results);

    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/productos.json', json);
  });
  // Consulta SQL
  query = 'SELECT * FROM sabores';

  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }

    // Convertir los resultados a JSON
    const json = JSON.stringify(results);

    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/sabores.json', json);
  });
  // Consulta SQL
  query = 'SELECT * FROM sucursales';

  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }

    // Convertir los resultados a JSON
    const json = JSON.stringify(results);

    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/sucursales.json', json);
  });
  // Consulta SQL
  query = 'SELECT * FROM promos';

  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }

    // Convertir los resultados a JSON
    const json = JSON.stringify(results);

    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/promos.json', json);
  });
  // Consulta SQL
  query = `SELECT sucursales.id, sucursales.sucursal, sucursales.descripcion, sucursales.link, sucursales.maps,zonas.zona
  FROM sucursales
  INNER JOIN zonas ON sucursales.idZona = zonas.id`;

  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }

    // Convertir los resultados a JSON
    const json = JSON.stringify(results);

    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/sucursales.json', json);
  });
  // Consulta SQL
  query = 'SELECT * FROM productospantalla';

  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }

    // Convertir los resultados a JSON
    const json = JSON.stringify(results);

    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/productosPantalla.json', json);
    
  });
  query = 'SELECT * FROM promosPantalla';

  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }

    // Convertir los resultados a JSON
    const json = JSON.stringify(results);

    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/promosPantalla.json', json);
  });
  query = 'SELECT * FROM categoriasisabores';
  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }
    // Convertir los resultados a JSON
    const json = JSON.stringify(results);
    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/categoriasIsabores.json', json);
  });
  query = 'SELECT * FROM categorias_sabores';
  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }
    // Convertir los resultados a JSON
    const json = JSON.stringify(results);
    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/categorias_sabores.json', json);
  });
  query = 'SELECT * FROM categorias_productos';
  // Ejecutar la consulta
  db.query(query, (err, results) => {
    if (err) {
      throw err;
    }
    // Convertir los resultados a JSON
    const json = JSON.stringify(results);
    // Guardar el JSON en un archivo
    fs.writeFileSync(__dirname + '/categorias_productos.json', json);
  });
});
