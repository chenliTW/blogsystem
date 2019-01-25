# blogsystem

!!!警告，此blog system一定有S-XSS vulnerability，可能有RCE與sqli vulnerability!!!

史上最陽春blogsystem(mysql+php)

弄一個 lamp 環境
然後想辦法建UTF-8環境的database，裡面有兩個table，一個是post，一個是member
```bash
blog   - post   - id (int)
                - title (text)
                - author (text)
                - post_time (datetime)
                - content (text)
   
       - member - name (varchar)
                - username (varchar)
                - password (varchar，要是 md5 hash)
```          
varchar size 就設 255，BJ4。
