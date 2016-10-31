from django.shortcuts import render
from django.core.urlresolvers import reverse_lazy
from django.shortcuts import redirect, render
from django.views.generic import View
from models import *
from forms import *
# Create your views here.

# ======================== CRUD Usuário (lista mista) ========================
class VisualizarUsuario(View):
    """View que redireciona para a url correta, dependendo do tipo de usuário
    Funciona para associado, docente, técnico e administrador. Redireciona
    para a home em outros casos"""

    def get(self, request, *args, **kwargs):
        # método first() retorna o primeiro elemento ou None
        associado = Associado.objects.filter(user=request.user).first()
        docente = Docente.objects.filter(user=request.user).first()
        tecnico = Tecnico.objects.filter(user=request.user).first()
        admin = Administrador.objects.filter(user=request.user).first()

        if associado:
            return redirect('/detalhar_associado/' + str(associado.pk))
        elif docente:
            return redirect('/detalhar_docente/' + str(docente.pk))
        elif tecnico:
            return redirect('/detalhar_tecnico/' + str(tecnico.pk))
        elif admin:
            return redirect('/detalhar_administrador/' + str(admin.pk))
        return redirect('/home/')


class ListarUsuario(ListView):
    model = Usuario
    template_name = "listar_usuario.html"
    qs_filtros = UsuarioFiltro.objects.all()

    def get_queryset(self):
        '''Na primeira vez em que se carrega a página, utilizamos o queryset
        default.

        Quando escolhe-se um filtro e clica-se no botão, verificamos o nome
        do filtro, pegamos o correspondente e transformamos o campo
        'filtro_json' em dicionário novamente. Usamos então como argumento do
        método filter().
        '''

        # Pega queryset default
        queryset = super(ListarUsuario, self).get_queryset()

        if self.request.GET.get("querysets"):  # 'name' do select (linha 34)
            selection = self.request.GET.get("querysets")
            for qs_filtro in self.qs_filtros:
                if selection == qs_filtro.nome_filtro:
                    dicionario = json.loads(qs_filtro.filtro_json)
                    queryset = queryset.filter(**dicionario)
        return queryset

    def render_to_response(self, context):
        '''Reescrevemos este método para passar string com pks de associados
        na url. Com essa string de pks (primary key, no caso, é id) poderemos
        reconstituir os objetos depois'''

        lista_pks = []
        for usuario in self.object_list.iterator():
            lista_pks.append(usuario.pk)
        string_lista_pks = str(lista_pks).replace(' ', '').\
            replace(',', '_').replace('[', '').replace(']', '').\
            replace('L', '')

        # Adiciona 'string_lista_pks' como variável de contexto
        try:
            context['string_lista_pks'] = string_lista_pks
        except AttributeError:
            messages.error(request, 'Houve problema ao carregar a lista')
        return super(ListarUsuario, self).render_to_response(context)
