<template>
    <div class="SharpDashboard">
        <template v-if="ready">
            <sharp-grid :rows="layout.rows">
                <template slot-scope="widgetLayout">
                    <sharp-widget :widget-type="widgets[widgetLayout.key].type"
                                  :widget-props="widgets[widgetLayout.key]"
                                  :value="data[widgetLayout.key]">
                    </sharp-widget>
                </template>
            </sharp-grid>
        </template>
    </div>
</template>

<script>
    import TabbedLayout from '../TabbedLayout';
    import Grid from '../Grid';
    import Widget from './Widget';
    import DynamicView from '../DynamicViewMixin';

    import { API_PATH } from '../../consts';

    export default {
        name:'SharpDashboard',
        extends: DynamicView,


        components: {
            [TabbedLayout.name]:TabbedLayout,
            [Grid.name]:Grid,
            [Widget.name]:Widget
        },
        data() {
            return {
                widgets: null
            }
        },
        computed: {
            apiPath() {
                return `${API_PATH}/dashboard`
            }
        },
        methods: {
            mount({layout, data, widgets}) {
                this.layout = layout;
                this.data = data || {};
                this.widgets = widgets;
            }
        },
        created() {
            this.get();
        }
    }
</script>