<?php

declare(strict_types=1);

use Modules\Rating\Filament\Resources\RatingResource\Pages\ListRatings;

// Business-logic oriented assertions on methods that build table config

describe('ListRatings page config', function (): void {
    it('defines expected table columns without labels', function (): void {
        $page = new ListRatings();
        /** @phpstan-ignore-next-line method.nonObject */
        $columns = $page->getTableColumns();
        expect($columns)->toBeArray();
        $columnKeys = array_keys($columns);
        expect($columnKeys)->toEqual(['id', 'title', 'rule', 'is_disabled', 'is_readonly']);
    });

    it('defines default empty filters and header actions', function (): void {
        $page = new ListRatings();
        expect($page->getTableFilters())->toBeArray()->toBeEmpty();
        expect($page->getTableHeaderActions())->toBeArray()->toBeEmpty();
    });

    it('defines view/edit/delete actions and bulk delete', function (): void {
        $page = new ListRatings();
        /** @phpstan-ignore-next-line method.nonObject */
        $actions = $page->getTableActions();
        expect($actions)->toHaveKeys(['view', 'edit', 'delete']);

        /** @phpstan-ignore-next-line method.nonObject */
        $bulk = $page->getTableBulkActions();
        expect($bulk)->toHaveKey('delete');
    });
});
