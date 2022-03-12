	
	<%
		int n2=Integer.parseInt(request.getParameter("n1"));
		int f1=0;
		int f2=1;
	%>

	<%

		out.println("<b>The fibonacci series is: </b>");
		out.println(f1);
		out.println(f2);

		int sum=1;

		do
		{
			out.println(sum);
			f1=f2;
			f2=sum;
			sum=f1+f2;

		}while(sum!=n2 && sum<n2);

	 %>

<%
        /* 
	    Input:-
	    6
	
	    Output:-
            The fibonacci series is: 0 1 1 2 3 5
	*/ 
%>