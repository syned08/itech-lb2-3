const ajax = new XMLHttpRequest();
const buttonWard = document.getElementById('get-ward-btn');

buttonWard.addEventListener('click', () => {
  const nursename = document.getElementById('nursename').value;

  ajax.onreadystatechange = loadData;
  ajax.open('GET', `php/getWard.php?nursename=${nursename}`);
  ajax.send();
});

const loadData = () => {
  if (ajax.readyState === 4 && ajax.status === 200) {
    document.getElementById('get-ward-result').innerHTML = ajax.response;
  }
}
