Опыт в linux совсем небольшой, но попыталась немного разобраться.

Создадим .sh файл и запишем туда следующее:


#!/bin/sh

while true
do
    php script.php
    sleep 13
done


в cron:
* * * * * bash bash_script.sh

Самое минимальное время выполнения задач - 1 минута. Как вариант, можно в самом скрипте 
выполнять запуск его же, что-то вроде:

while true
do 
    php script.php
    sleep 13
    bash bash_script.sh
done


Вполне возможно, что из-за функции sleep(), будет возникать погрешность во времени.
Опять же, как вариант, можно сделать примерно так:

while true
do
    if(( time() % 13 == 0 )); then
        php script.php
    fi
done
