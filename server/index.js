
const express = require('express')
const app = express()
const port = 8000
const bodyParser = require('body-parser')
app.use(bodyParser.urlencoded({
  extended: true
}));

app.use(bodyParser.json());

app.get('/', (req, res) => {
  res.send('Hello World!')
})


app.all('/test', function (req, res) {
  console.log(req.body);
 
res.json({"msg":"Success"})
})

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`)
})
