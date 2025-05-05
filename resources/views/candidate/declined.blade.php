@extends('layouts.dashboard')

@section('title', 'Menara - Declined Candidates')

@section('content')
<div class="container mx-auto px-4">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Candidats Refusés</h1>
        <p class="text-gray-600">Liste des candidats qui n'ont pas été retenus après entretien</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-green-500">
            <p class="text-sm text-gray-500">Total Candidats</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-orange-500">
            <p class="text-sm text-gray-500">Candidats Refusés</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['declined'] }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-red-500">
            <p class="text-sm text-gray-500">Taux de Refus</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['rate'] }}%</p>
        </div>
    </div>

    <!-- Declined Candidates Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Candidats Refusés</h2>
            <a href="{{ route('inclined') }}" class="text-blue-600 hover:text-blue-800">
                Voir les candidats acceptés
            </a>
        </div>

        <!-- Search Bar
        <div class="my-2 flex justify-between sm:flex-row flex-col p-4">
            <div class="block relative">
                <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                        <path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"></path>
                    </svg>
                </span>
                <input placeholder="Search" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>
        </div> -->

        <!-- Table -->
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nom
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Poste
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                company
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Recruteur
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Date d'entretien
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($declinedCandidates as $candidate)
                            @php
                                // Get the latest interview for this candidate
                                $latestInterview = $candidate->interviews->sortByDesc('scheduled_at')->first();
                                $interviewer = $latestInterview ? $latestInterview->interviewer : null;
                            @endphp
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $candidate->first_name }} {{ $candidate->last_name }}</div>
                                            <div class="text-sm text-gray-500">{{ $candidate->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $candidate->position }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $latestInterview && $latestInterview->offer ? $latestInterview->offer->company->user->name : 'Non spécifié' }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $interviewer ? $interviewer->name : 'Non assigné' }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $latestInterview ? $latestInterview->scheduled_at->format('d/m/Y') : 'Non planifié' }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                    Aucun candidat refusé trouvé
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($declinedCandidates->hasPages())
            <div class="mt-10 flex justify-center">
                <div class="flex items-center space-x-2">
                    {{-- Previous Page --}}
                    @if ($declinedCandidates->onFirstPage())
                    <span class="px-3 py-2 rounded-md border border-gray-300 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    @else
                    <a href="{{ $declinedCandidates->previousPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    @endif

                    {{-- Page Links --}}
                    @foreach ($declinedCandidates->getUrlRange(1, $declinedCandidates->lastPage()) as $page => $url)
                    @if ($page == $declinedCandidates->currentPage())
                    <span class="px-4 py-2 rounded-md border border-primary bg-primary text-white">{{ $page }}</span>
                    @elseif ($page <= $declinedCandidates->currentPage() + 2 && $page >= $declinedCandidates->currentPage() - 2)
                        <a href="{{ $url }}" class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">{{ $page }}</a>
                        @elseif ($page == $declinedCandidates->currentPage() + 3 || $page == $declinedCandidates->currentPage() - 3)
                        <span class="px-4 py-2 text-gray-500">...</span>
                        @endif
                        @endforeach

                        {{-- Next Page --}}
                        @if ($declinedCandidates->hasMorePages())
                        <a href="{{ $declinedCandidates->nextPageUrl() }}" class="px-3 py-2 rounded-md border border-gray-300 text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-colors duration-300">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        @else
                        <span class="px-3 py-2 rounded-md border border-gray-300 text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
