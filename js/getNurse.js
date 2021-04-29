const buttonNurse = document.getElementById('get-nurse-btn');

buttonNurse.addEventListener('click', () => {
  const department = document.getElementById('department').value;

  ajax.onreadystatechange = loadDataNurse;
  ajax.open('GET', `php/getNurse.php?department=${department}`);
  ajax.send();
});

const loadDataNurse = () => {
  if (ajax.readyState === 4 && ajax.status === 200) {
    const element = document.getElementById('get-nurse-result');
    const nurses = ajax.responseXML.firstChild.children;
    const department = document.getElementById('department').value;
    let result = `<h1 class="sub-header">Список медсестр из ${department} отделения:</h1> <div class="nurse-wrapper">`;

    for (let i = 0; i < nurses.length; i++) {
      result += `<div class="card"> ${nurses[i].textContent} </div>`;
    }

    element.innerHTML = `${result} </div>`;
  }
}
