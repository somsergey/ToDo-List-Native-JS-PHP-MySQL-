document.querySelectorAll('.edititem').forEach((element) => {
  element.addEventListener('click', (e) => {
    e.preventDefault();
    let textPath = element.parentElement.parentElement.getElementsByTagName('p')[0];
    let oldText = textPath.textContent;
    let id = element.parentElement.parentElement.getElementsByTagName('input')[0].value;

    textPath.innerHTML = '';

    textPath.insertAdjacentHTML('afterbegin', `
    <input class="newDescription" value="${oldText}">
    `);

    textPath.querySelector('.newDescription').addEventListener('change', () => {
      window.newText = document.querySelector('.newDescription').value;
      textPath.innerHTML = newText;
      console.log(newText);



      let response = await fetch('updateItem.php', {
        method: 'POST',
        body: window.newText,id,
      });
      console.log(response);

      /* let result = response.text(); */
    });

  })
});