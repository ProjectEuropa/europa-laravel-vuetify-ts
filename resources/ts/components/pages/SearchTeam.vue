<template>
  <v-content>
    <v-container fluid>
      <h1 class="display-1 mb-4 text--darken-1">Search Team Data</h1>
      <h4 class="subheading">チームデータの検索が可能です</h4>
      <v-form class="d-flex justify-md-space-center justify-sm-space-between">
        <v-text-field v-model="keyword" label="Solo" placeholder="keyword" solo></v-text-field>
        <v-select :items="items" v-model="orderType" solo></v-select>
        <v-btn class="primary" @click="onClickSearch()">Search</v-btn>
      </v-form>
      <v-simple-table dense>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">ダウンロード</th>
              <th class="text-left">オーナー名</th>
              <th class="text-left">コメント</th>
              <th class="text-left">ファイル名</th>
              <th class="text-left">アップロード日時</th>
              <th class="text-left">削除</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in teams" :key="index">
              <td>
                <v-icon>mdi-cloud-download-outline</v-icon>
              </td>
              <td>{{ item.upload_owner_name }}</td>
              <td style="white-space:pre-wrap; word-wrap:break-word;">{{ item.file_comment }}</td>
              <td>{{ item.file_name }}</td>
              <td>{{ item.created_at }}</td>
              <td>
                <v-icon @click="dialogOpen(item.file_name)">mdi-delete-forever</v-icon>
              </td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
      <v-pagination v-model="page" class="my-4" :length="15"></v-pagination>
    </v-container>
    <delete-modal ref="dialog" :delObj="delObj"></delete-modal>
    <v-overlay :value="overlay">
      <v-progress-circular color="primary" indeterminate size="64"></v-progress-circular>
    </v-overlay>
  </v-content>
</template>

<script lang="ts">
import { FileDataObject } from "../../vue-data-entity/FileDataObject";
import { SelectBoxTextValueObject } from "../../vue-data-entity/SelectBoxTextValueObject";
import DeleteModal from "../modules/DeleteModal.vue";
import { Vue, Component, Watch } from "vue-property-decorator";

@Component({
  components: {
    DeleteModal
  }
})
export default class SearchTeam extends Vue {
  teams: Array<FileDataObject> = [];
  keyword: string | (string | null)[] = "";
  page: number = 1;
  items: Array<SelectBoxTextValueObject> = [
    {
      text: "投稿日時の新しい順",
      value: "1"
    },
    {
      text: "投稿日時の古い順",
      value: "2"
    }
  ];
  orderType: string | (string | null)[] = "1";
  dialog: boolean = false;
  delObj: string = "";
  overlay: boolean = false;

  $refs!: {
    dialog: DeleteModal;
  };
  /**
   * name
   */
  public dialogOpen(file_name: string) {
    this.delObj = file_name;
    this.$refs.dialog.open();
  }

  /**
   * name
   */
  public created() {
    this.search();
  }

  /**
   * watch
   */
  @Watch("page")
  onPageChanged() {
    this.$router.push({
      path: "/search/team",
      query: {
        page: this.page.toString(),
        keyword: this.keyword,
        orderType: this.orderType
      }
    });
    this.search();
  }

  /**
   * search
   */
  public onClickSearch() {
    this.$router.push({
      path: "/search/team",
      query: {
        keyword: this.keyword,
        orderType: this.orderType
      }
    });
    this.search();
  }

  /**
   * search
   */
  public search() {
    this.page = isNaN(Number(this.$route.query.page))
      ? 1
      : Number(this.$route.query.page);
    this.overlay = true;
    Vue.prototype.$http
      .get(
        `/api/search?page=${this.page}&keyword=${this.keyword}&orderType=${this.orderType}`
      )
      .then((res: any): void => {
        this.teams = res.data.data;
        this.overlay = false;
      })
      .catch((error: any): void => {
        alert("検索実行時にエラーが発生しました")
        this.overlay = false;
      });
  }
}
</script>
