if [ ! -d vendor ]; then
  mkdir vendor
fi
wget https://raw.github.com/yuya-takeyama/venom/master/venom.php -O venom.php
chmod +x venom.php
./venom.php
wget https://raw.github.com/gist/221634/2bc31f04b0ed0ef70daab68516c8d17ba0753f5e/SplClassLoader.php -O vendor/SplClassLoader.php
