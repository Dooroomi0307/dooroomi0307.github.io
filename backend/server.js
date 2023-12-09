const express = require('express');
const mysql = require('mysql');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.static('./properties_img'));

const db = mysql.createConnection({
    host: "localhost",
    user: 'root',
    password: '',
    database: 'p4_product_db'
})

app.get('/',(re,res)=>{
    return res.json("From Backend Side");
})

app.get('/properties',(req, res) => {
    const sql = "SELECT * FROM properties";
    db.query(sql, (err, data)=>{
        if(err) return res.json(err);
        return res.json(data);
    })
})

app.listen(8081, () => {
    console.log("listening");
})