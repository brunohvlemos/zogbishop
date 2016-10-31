# Core Django imports

from django.conf.urls import include, url
from django.contrib.auth.decorators import login_required, permission_required

from django-crud.crud.views import *

urlpatterns = [
   # =============================== CRUDS ===============================
    # Usuários
    url(r'^cadastrar_usuario/$',
         login_required(CadastrarUsuario.as_view()),
         name='listar usuario'),
     url(r'^listar_usuario/$',
         login_required(ListarUsuario.as_view()),
         name='listar usuario'),
     url(r'^detalhar_usuario/(?P<pk>\d+)$',
         login_required(DetalharUsuario.as_view()),
         name='detalhar usuario'),
     url(r'^editar_usuario/(?P<pk>\d+)$',
         login_required(EditarUsuario.as_view()),
         name='editar usuario'), 

]