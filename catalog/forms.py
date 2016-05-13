from django import forms
from models import Product


class ProductAdminForm(forms.ModelForm):
	class Meta:
		model = Product
		exclude = []

	def clean_price(self):
		if self.cleaned_data['price'] <= 0:
			raise forms.ValidationError('O preco deve ser maior que zero.')
		return self.cleaned_data['price']

class ProductAddToCartForm(forms.Form):
	quantity = forms.IntegerField(widget=forms.TextInput(attrs={'size':'2',
		'value':'1', 'class':'quantity', 'maxlength':'5'}), 
		error_messages={'invalid':'Por favor entre com uma quantidade valida.'},
		min_value=1)
	product_slug = forms.CharField(widget=forms.HiddenInput())

	def __init__(self, request=None, *args, **kwargs):
		self.request = request
		super(ProductAddToCartForm, self).__init__(*args, **kwargs)

	# custom validation to check for cookies
	def clean(self):
		if self.request:
			if not self.request.session.test_cookie_worked():
				raise forms.ValidationError("Os cookies devem ser ativados.")
		return self.cleaned_data

class UploadFileForm(forms.Form):
    file = forms.FileField()