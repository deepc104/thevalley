# thevalley

Steps: 

1. Download the project from here - https://github.com/deepc104/thevalley
OR
Use git to clone using following command<br><br> 
	git clone https://github.com/deepc104/thevalley.git<br>

    Press Enter to create local clone.


2. Please find DB file in BKP/ filder. Change db details in /sites/default/settings.php (Run 'chmod 777 -R files settings.php' to change permissions of files folder & settings.php if required)<br>
3. Run thevalley/user on browser.<br>
   Username: admin
   Password: admin

4. I have used mpdf/mpdf package for download pdf functionality. <br>
   So mpdf/mpdf is required for that run following command (It will add mpdf in vendor dir):<br>

  composer require mpdf/mpdf

5. Go to - thevalley/admin/modules & enable invoice module. <br>
   - It will add Invoice menu administration toolbar. <br>
   - Invoice module provide us with add/edit/delete/list functionality. <br>
   - Also on view page there is 'Download pdf' button to download the invoice in pdf.<br>
<br>
<br>
We can add entity settings form where we can manage fields, Pdf could have been formatted in a better way by adding inline css to each element. 
I could have done it much better but due to time constraints I couldn't. 
Hope you consider this.  
Thank you !!
