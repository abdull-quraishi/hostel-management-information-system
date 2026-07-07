@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold my-6 text-gray-800 text-center">Monthly Report</h1>
    <hr class="mb-8 border-gray-300">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Total Income Card -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center justify-center border-l-8 border-green-500">
            <div class="flex items-center mb-3">
                <svg class="w-8 h-8 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v8"/>
                </svg>
                <h3 class="text-2xl font-semibold text-gray-700">Total Income</h3>
            </div>
            <p class="text-3xl font-bold text-green-600">{{ number_format($total_income) }} AFN</p>
        </div>

        <!-- Total Expenses Card -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center justify-center border-l-8 border-red-500">
            <div class="flex items-center mb-3">
                <svg class="w-8 h-8 text-red-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v8"/>
                </svg>
                <h3 class="text-2xl font-semibold text-gray-700">Total Expenses</h3>
            </div>
            <p class="text-3xl font-bold text-red-600">{{ number_format($total_expenses) }} AFN</p>
        </div>

        <!-- Profit / Loss Card -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center justify-center border-l-8 {{ $profit_loss >= 0 ? 'border-green-700' : 'border-red-700' }}">
            <div class="flex items-center mb-3">
                <svg class="w-8 h-8 {{ $profit_loss >= 0 ? 'text-green-700' : 'text-red-700' }} mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12v8"/>
                </svg>
                <h3 class="text-2xl font-semibold text-gray-700">Profit / Loss</h3>
            </div>
            <p class="text-3xl font-bold {{ $profit_loss >= 0 ? 'text-green-700' : 'text-red-700' }}">
                {{ number_format($profit_loss) }} AFN
            </p>
        </div>

    </div>

    <!-- Report Summary Table -->
    <div class="mt-10 bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6 mt-6 text-black-800">Report Summary</h2>

        <table class="min-w-full bg-white text-2xl">
            <tbody>
                <tr class="border-b">
                    <td class="py-3 px-4 font-medium text-gray-700">Month</td>
                    <td class="py-3 px-4">{{ $month }}</td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 font-medium text-gray-700">Year</td>
                    <td class="py-3 px-4">{{ $year }}</td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 font-medium text-gray-700">Total Income</td>
                    <td class="py-3 px-4 text-green-600 font-bold">{{ number_format($total_income) }} AFN</td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4 font-medium text-gray-700">Total Expenses</td>
                    <td class="py-3 px-4 text-red-600 font-bold">{{ number_format($total_expenses) }} AFN</td>
                </tr>
                <tr>
                    <td class="py-3 px-4 font-medium text-gray-700">Profit / Loss</td>
                    <td class="py-3 px-4 font-bold {{ $profit_loss >= 0 ? 'text-green-700' : 'text-red-700' }}">
                        {{ number_format($profit_loss) }} AFN
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
</div>
@endsection
