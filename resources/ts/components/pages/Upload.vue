<template>
  <v-content>
    <v-container fluid class="d-flex">
      <v-col cols="12" md="12">
        <v-form ref="form" lazy-validation justify="center">
          <v-row align="center" justify="center">
            <v-card class="mx-auto">
              <v-card-title class="blue">
                <v-list-item>
                  <v-list-item-action>
                    <v-icon>mdi-upload</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title class="headline white--text">アップロード(チームデータ)</v-list-item-title>
                    <v-list-item-subtitle class="white--text">チームデータのアップロードが可能です。</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card-title>
              <v-col cols="12" md="12">
                <ValidationProvider v-slot="{ errors }" name="オーナー名" rules="required|max:100">
                  <v-text-field
                    prepend-icon="mdi-account-circle"
                    v-model="ownerName"
                    :counter="100"
                    :error-messages="errors"
                    label="オーナー名"
                    required
                  ></v-text-field>
                </ValidationProvider>
                <ValidationProvider v-slot="{ errors }" name="コメント" rules="required|max:200">
                  <v-textarea
                    prepend-icon="mdi-comment-multiple-outline"
                    v-model="comment"
                    :error-messages="errors"
                    label="コメント"
                    required
                  ></v-textarea>
                </ValidationProvider>

                <v-combobox
                  v-model="searchTag"
                  :items="items"
                  :counter="4"
                  label="検索タグ"
                  multiple
                  chips
                  prepend-icon="mdi-tag-plus"
                >
                  <template v-slot:selection="data">
                    <v-chip
                      :key="JSON.stringify(data.item)"
                      v-bind="data.attrs"
                      :input-value="data.selected"
                      @click:close="data.parent.selectItem(data.item)"
                    >
                      <v-avatar
                        class="accent white--text"
                        left
                        v-text="data.item.slice(0, 1).toUpperCase()"
                      ></v-avatar>
                      {{ data.item }}
                    </v-chip>
                  </template>
                </v-combobox>
                <v-file-input append-icon show-size counter multiple label="チームデータ"></v-file-input>
              </v-col>
              <v-card-actions class="justify-center">
                <v-btn large block class="primary" @click="dialogOpen">チームデータアップロード</v-btn>
              </v-card-actions>
            </v-card>
          </v-row>
        </v-form>
      </v-col>
    </v-container>
    <v-container fluid class="d-flex">
      <v-col cols="12" md="12">
        <v-form ref="form" lazy-validation justify="center">
          <v-row align="center" justify="center">
            <v-card class="mx-auto">
              <v-card-title class="blue-grey">
                <v-list-item>
                  <v-list-item-action>
                    <v-icon>mdi-upload</v-icon>
                  </v-list-item-action>
                  <v-list-item-content>
                    <v-list-item-title class="headline white--text">アップロード(マッチデータ)</v-list-item-title>
                    <v-list-item-subtitle class="white--text">マッチデータのアップロードが可能です。</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card-title>
              <v-col cols="12" md="12">
                <v-text-field
                  prepend-icon="mdi-account-circle"
                  v-model="ownerName"
                  :counter="10"
                  label="オーナー名"
                  required
                ></v-text-field>

                <v-textarea
                  prepend-icon="mdi-comment-multiple-outline"
                  v-model="comment"
                  label="コメント"
                  required
                ></v-textarea>
                <v-combobox
                  v-model="searchTag"
                  :items="items"
                  label="検索タグ"
                  multiple
                  chips
                  prepend-icon="mdi-tag-plus"
                >
                  <template v-slot:selection="data">
                    <v-chip
                      :key="JSON.stringify(data.item)"
                      v-bind="data.attrs"
                      :input-value="data.selected"
                      :disabled="data.disabled"
                      @click:close="data.parent.selectItem(data.item)"
                    >
                      <v-avatar
                        class="accent white--text"
                        left
                        v-text="data.item.slice(0, 1).toUpperCase()"
                      ></v-avatar>
                      {{ data.item }}
                    </v-chip>
                  </template>
                </v-combobox>
                <v-file-input append-icon show-size counter multiple label="チームデータ"></v-file-input>
              </v-col>
              <v-card-actions class="justify-center">
                <v-btn large block color="blue-grey" class="white--text">マッチデータアップロード</v-btn>
              </v-card-actions>
            </v-card>
          </v-row>
        </v-form>
      </v-col>
    </v-container>
    <confirm-modal ref="dialog"></confirm-modal>
  </v-content>
</template>

<script lang="ts">
import ConfirmModal from "../modules/ConfirmModal.vue";
import { Vue, Component, Watch } from "vue-property-decorator";

@Component({
  components: {
    ConfirmModal
  }
})
export default class Upload extends Vue {
  items: Array<string> = ["大会ゲスト許可", "フリーOKE"];
  ownerName: string = "";
  comment: string = "";
  searchTag: Array<string> = [];
  deletePassword: string = "";

  /**
   * watch
   */
  @Watch("searchTag")
  onSearchTagChanged() {
    if (this.searchTag.length > 4) {
      this.$nextTick(() => this.searchTag.pop());
    }
  }

  $refs!: {
    dialog: ConfirmModal;
  };

  /**
   * name
   */
  public dialogOpen() {
    this.$refs.dialog.open();
  }
}
</script>
