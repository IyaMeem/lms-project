<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due Date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">{{ $invoice->id }}</td>
                <td class="border px-4 py-2">{{ $invoice->user->namel }}</td>
                <td class="border px-4 py-2">{{ date('F j, Y', strtotime($invoice->due_date)) }}</td>
                <td class="border px-4 py-2 text-center">{{ $invoice->amount($invoice_id) ['total']}} </td>
                <td class="border px-4 py-2 text-center">{{ $invoice->amount($invoice_id) ['paid']}} </td>
                <td class="border px-4 py-2 text-center">{{ $invoice->amount($invoice_id) ['due']}} </td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a class="px-2" href="">
                            @include('components.icons.eye')
                        </a>
                        <form class="mt-2" onsubmit="return confirm('Are you sure Delete it?');" wire:submit.prevent="invoiceDelete({{$invoice->id}})">
                            <button type="submit">
                                  @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $invoices->links() }}
    </div>

</div>
