<tr> 
    <td colspan="5" class="alert alert-primary"> 
        <div>
            <h4 class="text-center">Datos Complementarios</h4>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    Tipo de Contratación
                </label>

                <div class="col-md-6">
                    <select wire:model="TiposContratacion" class="form-control">
                        <option></option>
                        @foreach ($catTiposContratacion as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('TiposContratacion') <span style="color: #d90000">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    Tipo de Personal
                </label>

                <div class="col-md-6">
                    <select wire:model="TiposPersonal" class="form-control">
                        <option></option>
                        @foreach ($catTiposPersonal as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('TiposPersonal') <span style="color: #d90000">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">
                    Jornada de Trabajo
                </label>

                <div class="col-md-6">
                    <select wire:model="JornadaTrabajo" class="form-control">
                        <option></option>
                        @foreach ($catJornadaTrabajo as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('JornadaTrabajo') <span style="color: #d90000">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button wire:click="UpdateComplemento" type="submit" class="btn btn-sm btn-primary">
                        Guardar
                    </button>
                    <button type="submit" class="btn  btn-sm btn-danger" wire:click='defaultView'>
                        Cancelar
                    </button>
                </div>
            </div>

        </div>
    </td>
</tr>
