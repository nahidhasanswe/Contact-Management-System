function formValidation()
{
	var firstName=document.contact.firstName;
	var lastName=document.contact.lastName;
	var City=document.contact.City;
	var District=document.contact.District;
	var Zipcode=document.contact.Zip;
	var Email=document.contact.Email;
	var Phone=document.contact.Phone;
	var Err=document.contact.warning;

	if(valid_Name($firstName))
	{
		return true;
	}else
	{
		return false;
	}

}

function valid_Name($Name)
{
	var letters = /^[A-Za-z]+$/;
	if($Name.value.length==0)
	{
		Err.innerHtml="First and Last Name required";
		return true;
	}else
	{
		return false;
	}
}