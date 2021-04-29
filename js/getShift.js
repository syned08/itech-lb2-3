const buttonShift = document.getElementById('get-shift-btn');

buttonShift.addEventListener('click', () => {
  const shift = document.getElementById('shift').value;

  fetch(`php/getShift.php?shift=${shift}`)
    .then(res => res.json())
    .then(data => renderResponse(data));
});

const renderResponse = data => {
  const shift = document.getElementById('shift').value;
  let result = `<h1 class="sub-header">Дежурства в ${shift} смену:</h1> <table class="table-shift"> <tr><th>Медсестра</th><th>Дата</th><th>Палата</th></tr>`;

  data.forEach(el => {
    result += `<tr> <td>${el.name}</td> <td>${el.date}</td> <td>${el.wardName}</td> </tr>`;
  });

  document.getElementById('get-shift-result').innerHTML = `${result} </table>`;
}
