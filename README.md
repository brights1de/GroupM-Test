### Test task

1. Создать пять кнопок со значениями «1», «2», «3», «4» и «5». Изначально они расположены вертикально друг над другом в случайном порядке.
При нажатии на любую из кнопок – эта кнопка смещается на позицию, соответствующую своему значению. Если эта кнопка уже находится в этой позиции – она встаёт в начало списка.
То есть: допустим стартовый порядок – 34251; нажали «4», новое состояние – 32541; снова нажали «4» - новое состояние – 43251.
2. Написать скрипт, скачивающий содержимое страницы http://top.rbc.ru и выводящий в удобном виде список заголовков новостей и времени добавления новости на сайте. При наведении на строку списка – всплывающая подсказка, содержащая первые три предложения из содержимого новости, в правом углу – картинку (если есть), текст обтекает картинку. При клике – переходим на страницу новости. 

### Installation

Git clone project.

Install composer dependencies :
```sh
composer install
```

Install npm dependencies :
```sh
npm install
```
