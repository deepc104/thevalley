# thevalley

Steps: 

1. Download the project from here - https://github.com/deepc104/thevalley
Or 
1. Use git to clone using following command 
	git clone https://github.com/deepc104/thevalley.git

    Press Enter to create local clone.


2. Change db details in /sites/default/settings.php (Run 'chmod 777 -R files settings.php' to change permissions of files folder & settings.php if required)
3. Run thevalley/ on browser.
4. I have used mpdf/mpdf package for download pdf functionality. 
   So mpdf/mpdf is required for that run following command (It will add mpdf in vendor dir):

  composer require mpdf/mpdf 

5. Go to - thevalley/admin/modules & enable invoice module. 
   - It will add Invoice menu administration toolbar. 
   - Invoice module provide us with add/edit/delete/list functionality. 
   - Also on view page there is 'Download pdf' button to download the invoice in pdf.


We can add entity settings form where we can manage fields, Pdf could have been formatted in a better way by adding inline css to each element. 
I could have done it much better but due to time constraints I couldn't. 
Hope you consider this.  
Thank you !!