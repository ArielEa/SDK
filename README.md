# 系统对接用SDK
# Author: Ariel < ariel673770@163.com >
# 无固定模式，可自由编写

# 使用方式及参数说明
1). CLI MODE:   
`php test.php -a 1234567890 -s secrtywww -m Entry.Order -t confirm` 

解释:  

	a -> appKey  # 客户编码

	s -> secret  # 密钥
	
	m -> method  # 接口名  
	
	t -> status  # 接口触发类型, create or confirm

2). FPM MODE:   
`https://localhost/test.php?appKey=1234567890&secret=secrtywww&method=Entry.Order&status=confirm`
