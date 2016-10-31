from django.forms import extras
import datetime
from django.forms import ModelForm, PasswordInput, CharField, MultipleChoiceField
from django.contrib.auth.models import User
from django import forms
from django.contrib.auth.forms import SetPasswordForm

class TOCForm(ModelForm):

    def __init__(self, *args, **kwargs):
        super(ModelForm, self).__init__(*args, **kwargs)
        for field_name, field in self.fields.items():
            field.widget.attrs['class'] = "form-control"
            #field.widget.attrs['id'] = "form_control_1"


class SetPasswordForm(SetPasswordForm):

    """Reescrevo este form para melhorar sua aparência. Ele é usado para a
    confirmação de troca de senha. Sua chamada ocorre em 'animais/urls.py'."""

    def __init__(self, *args, **kwargs):
        super(SetPasswordForm, self).__init__(*args, **kwargs)
        for field_name, field in self.fields.items():
            field.widget.attrs['class'] = "form-control"
            field.widget.attrs['id'] = "form_control_1"
            if field_name == "new_password1":
                field.widget.attrs['placeholder'] = "Nova senha"
            if field_name == "new_password2":
                field.widget.attrs['placeholder'] = "Confirme sua senha"



class UserForm(TOCForm):

    password = CharField(required=True, widget=PasswordInput, label="Senha",
                         min_length="8")

    class Meta:
        model = User
        fields = ["username", "password", "email"]
        abstract = True

    def __init__(self, *args, **kwargs):
        super(UserForm, self).__init__(*args, **kwargs)
        # self.fields['data_entrega'].help_text = "A data de entrega deve "
        self.fields['username'].label = "Username"

class UsuarioForm(TOCForm):

    class Meta:
        model = Usuario
        fields = ['nome', 'sobrenome', 'foto_perfil']
        abstract = True