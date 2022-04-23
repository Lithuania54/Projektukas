var tableData = 

var index = 1
 
for (var i in tableData){
      var row = `<tr>
            <td>${index}</td>
            <td>${tableData[i].Zaidejas}</td>
            <td>${tableData[i].Klubas}</td>
            <td>${tableData[i].Rungtynes}</td>
            <td>${tableData[i].Suma}</td>
            <td>${tableData[i].Vidurkis}</td>
      </tr>`

      index += 1

      var table = $('#table-body2')
      table.append(row)
}