from django import forms
from models import CartItem
class ProductAddToCartForm(forms.ModelForm):
	class Meta:
		model = CartItem
		fields = ('quantity',)
		quantity = forms.IntegerField(widget=forms.TextInput(), error_messages={'invalid':'Please enter a valid quantity.'},min_value=1)