<tr> 
    <td colspan="5" class="alert alert-primary"> 
        <div>
            <h4 class="text-center">Roles del Empleado</h4>
            <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">
                    Roles
                </label>

                <div class="col-md-6">
                    <select wire:model="rolNuevo" class="form-control">
                        <option></option>
                        @foreach ($cat_Roles as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('rolNuevo') <span style="color: #d90000">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-3">
                    <button wire:click="AgregarRol" class="form-control col-lg-6 btn btn-sm btn-primary">Agregar</button>
                </div>
            </div>

            <div class="alert alert-primary row">
                @foreach($roles_Empleado as $role)
                <h5><span class="badge" style="color:#fff; background-color:#1883BA;">{{$role['name']}}<a wire:click="QuitarRol({{$role['id']}},'{{$role['name']}}')">@include("layouts.equis")</a></span><h5 style="width:5px;"></h5></h5> 
                @endforeach
            </div>
            <div class="form-group row offset-lg-4 col-lg-4">
                <button wire:click="updateRoles" class="form-control col-lg-6 btn btn-sm btn-primary">Guardar</button>
                <button wire:click='defaultView' class="form-control col-lg-6 btn btn-sm btn-danger">Cancelar</button>
            </div>
        </div>
    </td>
</tr>
