<div class="w-full flex justify-center p-10" x-data="{fields:@entangle('data')}">
        <table class="h-full w-full table-auto border-collapse border border-slate-500 text-center">
            <thead>
                <th class="border border-slate-600"> # </th>
                <th class="border border-slate-600"> Service </th>
                <th class="border border-slate-600"> Quantity </th>
                <th class="border border-slate-600"> Price </th>
                <th class="border border-slate-600"> Total </th>
            </thead>
            <tr>
                <td class="border border-slate-600"> 1        </td>
                <td class="border border-slate-600"> Service1  </td>
                <td class="border border-slate-600"> 100 </td>
                <td class="border border-slate-600"> 100    </td>
                <td class="border border-slate-600"> 300    </td>
            </tr>
            <tr>
                <td class="border border-slate-600"> 1        </td>
                <td class="border border-slate-600"> Service1  </td>
                <td class="border border-slate-600"> 100 </td>
                <td class="border border-slate-600"> 100    </td>
                <td class="border border-slate-600"> 300    </td>
            </tr>

        </table>
    <!-- https://jsfiddle.net/5Lchundm/9/ -->
    <!-- <div class="col">
<table class="table table-bordered align-items-center table-sm">
  <thead class="thead-light">
   <tr>
     <th>#</th>
     <th>Price</th>
     <th>Service</th>
     <th>Values</th>
     <th>Remove</th>
    </tr>
  </thead>
  <tbody>

    <template x-for="(field, index) in fields" :key="index">
     <tr>
      <td x-text="index + 1"></td>
      <td><input x-model="field.txt1" type="text" name="txt1[]" class="form-control"></td>
      <td><select x-model="field.option" class="form-control">
        <template x-for="color in $wire.options">
          <option x-text="color"></option>
        </template>
      </select></td>
      <td>
        <span x-text="field.txt1"></span> <span x-text="field.option"></span>
      </td>
       <td><button type="button" class="btn btn-danger btn-small" @click="removeField(index,fields)">&times;</button></td>
    </tr>
   </template>

  </tbody>
  <tfoot>
     <tr>
       <td colspan="5" class="text-right"><button type="button" class="btn btn-info" @click="addNewField(fields)">+ Add Row</button></td>
    </tr>
  </tfoot>
</table>
<button wire:click="show">click me</button>
</div> -->
</div>
<script>
    function addNewField(fields) {
        fields.push({
            txt1: '',
            option: ''
        });
    }

    function removeField(index, fields) {
        fields.splice(index, 1);
    }
    // function handler() {
    //     return {
    //     //   fields: [],
    //       addNewField() {
    //           this.fields.push({
    //               txt1: '',
    //               option: ''
    //            });
    //         },
    //         removeField(index) {
    //            this.fields.splice(index, 1);
    //          },
    //       //@this.set('data',fields);
    //       }
    //  }
</script>