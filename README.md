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
├── P1070010.JPG
├── P1070011.JPG
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
    ├── 20-34-26.jpg
    ├── 20-34-28.jpg
    ├── 20-34-34.jpg
    ├── 20-34-36.jpg
    ├── 20-34-54.jpg
    ├── 20-34-56.jpg
    ├── 20-35-04.jpg
    ├── 20-35-08_1.jpg
    ├── 20-35-08_2.jpg
    ├── 20-35-24.jpg
    ├── 20-35-36_1.jpg
    ├── 20-35-36_2.jpg
    ├── 20-36-06.jpg
    ├── 20-36-14.jpg
    ├── 20-36-34.jpg
    ├── 20-36-46_1.jpg
    ├── 20-36-46_2.jpg
    ├── 20-36-46_3.jpg
    ├── 20-36-50.jpg
    ├── 20-37-04.jpg
    ├── 20-37-46.jpg
    ├── 20-38-34
    │   ├── 1.jpg
    │   ├── 2.jpg
    │   ├── 3.jpg
    │   ├── 4.jpg
    │   ├── 5.jpg
    │   ├── 6.jpg
    │   ├── 7.jpg
    │   └── animation.gif
    ├── 20-38-40
    │   ├── 1.jpg
    │   ├── 2.jpg
    │   ├── 3.jpg
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
