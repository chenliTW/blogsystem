# blogsystem

!!!警告，此blog system一定有S-XSS vulnerability與sqli vulnerability和RCE vulnerability，但都在管理頁面裡面!!!

史上最陽春blogsystem(mysql+php)

<img src="https://github.com/chenliTW/blogsystem/raw/master/examplepic/blog.PNG" height="500"><br>
<img src="https://github.com/chenliTW/blogsystem/raw/master/examplepic/admin.PNG" height="500"><br>

弄一個 lamp 環境
然後想辦法建UTF-8環境的database，裡面有兩個table，一個是post，一個是member
```bash

 DB    | table  | column

blog   - post   - id (int)
                - title (text)
                - author (text)
                - post_time (datetime)
                - content (text)
   
       - member - name (varchar)
                - username (varchar)
                - password (varchar，要是 md5 hash)
```          
varchar size 就設 255。


在config/dbconnect.php裡可以設定連接db的參數 $conn = new mysqli(hostname,username,password,database);

