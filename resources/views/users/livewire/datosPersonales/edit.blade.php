<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a wire:click="CambiarMenu(0)" class="nav-link @if($menuEdicion[0])active @endif" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="{{$menuEdicion[0]}}">Datos Personales</a>
        </li>
        <li class="nav-item">
          <a wire:click="CambiarMenu(1)" class="nav-link @if($menuEdicion[1])active @endif" id="area-tab" data-toggle="tab" href="#area" role="tab" aria-controls="area" aria-selected="{{$menuEdicion[1]}}">Area y Puestos</a>
        </li>
        <li class="nav-item">
          <a wire:click="CambiarMenu(2)" class="nav-link @if($menuEdicion[2])active @endif" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="{{$menuEdicion[2]}}">Correo</a>
        </li>
        <li class="nav-item">
          <a wire:click="CambiarMenu(3)" class="nav-link @if($menuEdicion[3])active @endif" id="contraseña-tab" data-toggle="tab" href="#contraseña" role="tab" aria-controls="contraseña" aria-selected="{{$menuEdicion[3]}}">Contraseña</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade @if($menuEdicion[0]) show active @endif " id="datos" role="tabpanel" aria-labelledby="datos-tab">
            <br>@include("users.livewire.datosPersonales.nav-link.datosPersonales")
        </div>
        <div class="tab-pane fade @if($menuEdicion[1]) show active @endif " id="area" role="tabpanel" aria-labelledby="area-tab">
            <br>@include("users.livewire.datosPersonales.nav-link.area")
          </div>
          <div class="tab-pane fade @if($menuEdicion[2]) show active @endif " id="email" role="tabpanel" aria-labelledby="email-tab"><br>
            <br>@include("users.livewire.datosPersonales.nav-link.correo")
          </div>
          <div class="tab-pane fade @if($menuEdicion[3]) show active @endif " id="contraseña" role="tabpanel" aria-labelledby="contraseña-tab">
            <br>@include("users.livewire.datosPersonales.nav-link.contraseña")
          </div>
    </div>
    
</div>

