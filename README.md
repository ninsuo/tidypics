# TidyPics

A small script that automatically:
- reorder pictures coming from a camera
- create gifs from speedshots (>= 5 shots each separated by <= 2 secs)

## Example:

```sh
alain@home.fuz.org ~/Desktop/test
$ tree .
.
├── P1060988.JPG
├── P1060989.JPG
├── P1060990.JPG
├── P1060991.JPG
├── P1060992.JPG
├── P1060993.JPG
├── P1060994.JPG
├── P1060995.JPG
├── P1060996.JPG
├── P1060997.JPG
├── P1060998.JPG
├── P1060999.JPG
├── P1070001.JPG
├── P1070002.JPG
├── P1070003.JPG
├── P1070004.JPG
├── P1070005.JPG
├── P1070006.JPG
├── P1070009.JPG
├── P1070010.MOV
├── P1070011.MOV
├── P1070012.JPG
├── P1070013.JPG
├── P1070014.JPG
├── P1070015.JPG
├── P1070016.JPG
├── P1070017.JPG
├── P1070018.JPG
...
alain@home.fuz.org ~/Desktop/test
$ tidypics
$ tree .
.
└── 2016-04-12
    ├── 20-41-14.gif
    ├── 20-41-14.jpg
    ├── 20-41-46.jpg
    ├── 20-41-52.jpg
    ├── 20-42-02.jpg
    ├── 20-42-38.jpg
    ├── 20-43-16
    │   ├── 1.jpg
    │   ├── 2.jpg
    │   ├── 3.jpg
    │   ├── 4.jpg
    │   ├── 5.jpg
    │   ├── 6.jpg
    │   ├── 7.jpg
    │   └── 8.jpg
    ├── 20-43-16.gif
    ├── 20-43-30
    │   ├── 01.jpg
    │   ├── 02.jpg
    │   ├── 03.jpg
    │   ├── 04.jpg
    │   ├── 05.jpg
    │   ├── 06.jpg
    │   ├── 07.jpg
    │   ├── 08.jpg
    │   ├── 09.jpg
    │   └── 10.jpg
    ├── 20-43-30.gif
    ├── 21-40-16.mov
    ├── 21-41-10.mov
    ├── 21-41-38.jpg
    ├── 21-44-44.jpg
    ├── 21-44-58.jpg
    ├── 21-45-16.jpg
    ├── 21-45-20.jpg
    ├── 22-44-04
    │   ├── 1.jpg
    │   ├── 2.jpg
    │   ├── 3.jpg
    │   ├── 4.jpg
    │   ├── 5.jpg
    │   └── 6.jpg
    ...
```

## Installation:

1) download:

```
cd /Users/alain/scripts
git clone git@github.com:ninsuo/tidypics.git
```

2) create an alias in your shell config:

```sh
alias tidypics='php /Users/alain/scripts/tidypics/tidypics.php'
```

## Usage

In a directory containing pictures, type `tidypics`

## Requirements:

- php >= 5.5
- ImageMagick (for creating gifs)

## About

My camera natively create gifs but I f*cked up last time and I almost only did speedshots.
Needed to create some workaround.
