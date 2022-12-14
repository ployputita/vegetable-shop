@extends('layouts.main')

@section('content')
<div class="flex items-end justify-end space-x-3 my-2">
    <button class="px-4 py-2 text-sm bg-[#B3BA1E] font-bold rounded" onclick="printDiv('printThis')">Print</button>
</div>
<section class="mt-10" id="printThis">
    <div class="flex items-center justify-center">
        <div class="w-4/5 bg-white shadow-lg mt-10">
            <div class="flex justify-center p-4">
                <div class="flex items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1617/1617578.png" alt="" style="width: 70px">
                    <h1 class="text-3xl font-bold mx-2 ml-4">ใบเสร็จ</h1>
                </div>
            </div>
            <div class="w-full h-0.5 bg-[#80b319]"></div>
            <div class="flex justify-between p-4 ml-6">
                <div>
                    <p class="font-bold">ร้านค้า: ร้านขายผัก</p>
                    <p class="font-bold"> วันที่ออกใบเสร็จ: {{ $receipt->วันที่ออกใบเสร็จ }}</p>
                    <p class="font-bold"> รหัสคำสั่งซื้อ: {{ $receipt->รหัสคำสั่งซื้อ }}</p>
                </div>
                <div class="w-50">
                    <p class="font-bold">ชื่อลูกค้า: {{ $customer->ชื่อลูกค้า }}</p>
                    <p class="font-bold">ออกใบเสร็จโดย: {{ $employee->ชื่อพนักงาน }}</p>
                </div>
                <div></div>
            </div>
            <div class="flex justify-center p-4">
                <div class="border-b border-gray-200 shadow">
                    <table class="">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2">
                                    ลำดับ
                                </th>
                                <th class="px-4 py-2">
                                    ชื่อสินค้า
                                </th>
                                <th class="px-4 py-2">
                                    จำนวนสินค้า
                                </th>
                                <th class="px-4 py-2">
                                    ราคาสินค้าต่อหน่วย
                                </th>
                                <th class="px-4 py-2">
                                    ราคารวมย่อย
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($orderLists as $orderList)
                            <tr>
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $products->find($orderList->รหัสสินค้า)->ชื่อสินค้า }}</td>
                                <td class="px-6 py-4">{{ number_format($orderList->จำนวนสินค้า) }}</td>
                                <td class="px-6 py-4">{{ number_format($products->find($orderList->รหัสสินค้า)->ราคาสินค้าต่อหน่วย) }}</td>
                                <td class="px-6 py-4">{{ number_format($orderList->ราคารวมย่อย) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="font-bold text-end mr-4">ราคารวมทั้งสิ้น: <b>{{ number_format($total) }} บาท</b></div>
                    <div class="font-bold text-end mr-4"><b>{{ $total_text }}</b></div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection
